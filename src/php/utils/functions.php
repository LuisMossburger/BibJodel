<?php

//VARIABLEN

//Konfigurationsdatei laden
require_once("./config.php");

//aktuelle Zeit
date_default_timezone_set("Europe/Berlin");
$Uhrzeit = date("H:i");
//Zeitstempel für JodelAPI
$ZeitDat = date("Y-m-d");
$ZeitUhr = date("H:i:s");
$Zeitstempel = $ZeitDat . "T" . $ZeitUhr . "Z";



//FUNKTIONEN
//Funktion, um JSON auszulesen
function readJSON($file) {
  //JSON Bib einlesen und zurückgeben
  $Lesesaalampel = json_decode($file, true);
  return $Lesesaalampel;
}

//Funktion, um Error-Mail abzusenden
function sendErrorMail($Nachricht) {
    //Mail absenden
    mail(MAIL_ADRESSE, MAIL_BETREFF, $Nachricht);
}

//Funktion, um Zeichengrenze bei Jodel zu beachten
function jodelTooLong($Text) {
    //Ist Jodel länger als Zeichengrenze?
    if ( strlen($Text) > JODEL_ZEICHEN ) {
        return true;
    //Ansonsten (Text nicht zu lang)
    } else {
        return false;
    }
}

//Funktion, um Jodel abzuschicken
function sendJodel($Text, $color) {

    //Variablen
    global $Zeitstempel;
    //Jodel festlegen
    $jodel = "
    curl -X POST \
      https://api.go-tellm.com/api/v3/posts \
      -H 'Accept: */*' \
      -H 'Accept-Encoding: gzip, deflate' \
      -H 'Authorization: Bearer " . API_KEY . "' \
      -H 'Cache-Control: no-cache' \
      -H 'Connection: keep-alive' \
      -H 'Content-Type: application/json; charset=UTF-8' \
      -H 'Host: api.go-tellm.com' \
      -H 'X-Authorization: HMAC 123' \
      -H 'cache-control: no-cache' \
      -H 'x-timestamp: $Zeitstempel' \
      -d '{
        \"message\": \"$Text\",
        \"channel\": \"" . CHANNEL . "\",
        \"color\": \"$color\"
    }'
    ";

    //Jodel an die JodelAPI senden
    $output = shell_exec($jodel);
    //Antwort der JodelAPI lesen
    $jodelAnswer = readJSON($output);
    //Falls Jodel nicht erfolgreich
    if ( array_key_exists("error", $jodelAnswer) ) {
      //ErrorMail senden
      sendErrorMail("Dieser Jodel konnte nicht gesendet werden, da:\n" . $jodelAnswer["error"] . "\n'" . $Text . "'");
    }
    //Pausieren, damit keine JodelSperre eintritt (passiert ab 3 Jodel pro Minute)
    sleep(20);
}

//Funktion, um Posts aus Channel zu lesen
function readChannel () {
    $output = shell_exec("
    curl -X GET \
      'https://api.go-tellm.com/api/v3/posts/channel?channel=" . CHANNEL . "' \
      -H 'Accept: */*' \
      -H 'Accept-Encoding: gzip, deflate' \
      -H 'Authorization: Bearer " . API_KEY . "' \
      -H 'Cache-Control: no-cache' \
      -H 'Connection: keep-alive' \
      -H 'Host: api.go-tellm.com' \
      -H 'cache-control: no-cache'
    ");
}

?>
