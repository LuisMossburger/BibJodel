<?php

//Funktionen laden
require_once("./functions.php");



//EVENTJODEL____________________________________________________________________
//String für Events
$eventJodel = "";
//Array für Eventkategorien
$eventKats = array();
//JSON der Bib einlesen
$bibJSON = readJSON(file_get_contents(JSON_FILE_EVENTS));

//Array für alle Eventkategorien aufsetzen, damit Events geordnet gejodelt werden können
foreach ( EVENT_KATS as $kat ) {
  $eventKats[$kat] = array();
}
//Für jedes Event in JSON
foreach ( $bibJSON["events"] as $event ) {
    //Eintragen in $eventKats nach jeweiliger Eventkategorie für geordnete Ausgabe
    $eventKats[$event["category"]][] = $event;
}

//Für jede Eventkategorie in $eventKats
foreach ( $eventKats as $eventKat ) {
    //falls Kategorie nicht leer
    if ( !empty($eventKat) ) {
        //Für jedes einzelne Event in der Kategorie
        foreach ( $eventKat as $event ) {
            //Eventtitel, -zeit und Ort als Text
            $eventJodel = EVENT . " | " . $event["category"] . "\\n" . $event["start"] . "-" . $event["end"] . " | " . $event["room"] . " | " . $event["title"] . ".\\n";
            //Falls Jodel Zeichengrenze übersteigt
            if ( jodelTooLong($eventJodel) ) {
                //ErrorMail senden
                sendErrorMail("Bitte Texte in Konfigurationsdatei oder JSON ändern. Dieses Event ist zu lange, um abgeschickt zu werden:\n'$eventJodel'");
            //Falls Jodel Zeichengrenze nicht übersteigt
            } else {
                //EventJodel absenden
                //FARBCODE NICHT ÄNDERN (nur wenige Farben sind in Jodel "legal")
                sendJodel($eventJodel, "FF9908");
            }
            //EventJodel wieder leeren
            $eventJodel = "";
        }
    }
}

?>
