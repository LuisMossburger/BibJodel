<?php

//Funktionen laden
require_once("./utils/functions.php");



//BELEGUNGSJODEL________________________________________________________________
//String für Belegung
$BelegungsJodel = "";
//Array für aufgelöste Belegung (also die Namen verwenden, die in der config.php festgelegt wurden)
$Belegung = array("low" => LOW, "mid" => MID, "high" => HIGH);
//JSON der Bib einlesen
$bibJSON = readJSON(file_get_contents(JSON_FILE));

//Für jede Bib
foreach ( $bibJSON["lib"] as $libKey => $lib ) {
    //falls Bib gerade geöffnet (aktuelle Zeit zwischen Öffnungs- und Schließzeit der Bib)
    if ( (strtotime($lib["open"]) <= strtotime($Uhrzeit)) && (strtotime($Uhrzeit) <= strtotime($lib["close"])) ) {
        //Falls Jodel zu lange ist (also zeichengrenze überschreitet)
        if ( jodelTooLong( $BelegungsJodel . BIB_NAMEN[$libKey-1] . " | " . $Belegung[$lib["traffic"]] . "\\n" ) ) {
            //Falls neuer Anhang alleine bereits zu lang (kann also gar nicht gesendet werden)
            if ( jodelTooLong( BIB_NAMEN[$libKey-1] . " | " . $Belegung[$lib["traffic"]] . "\\n" ) ) {
                //ErrorMail senden
                sendErrorMail("Bitte Texte in Konfigurationsdatei oder JSON ändern. Der Belegungsjodel ist zu lange, um abgeschickt zu werden:\n" . BIB_NAMEN[$libKey-1] . " | " . $Belegung[$lib["traffic"]] . "\\n");
            //Wenn nur zusammen mit neuem Anhang zu lang für einen Jodel
            } else {
                //BelegungsJodel ohne neuen Anhang senden und wieder leeren
                //FARBCODE NICHT ÄNDERN (nur wenige Farben sind in Jodel "legal")
                sendJodel($BelegungsJodel, "06A3CB");
                $BelegungsJodel = "";
            }
        }
        //neuen Text mit Belegung der Bib anhängen (nachdem entweder nicht zu lang oder vorher geleert wurde)
        $BelegungsJodel .= BIB_NAMEN[$libKey-1] . " | " . $Belegung[$lib["traffic"]] . "\\n";

    //falls Bib gerade geschlossen
    } else {
        //Falls Jodel zu lange ist (also zeichengrenze überschreitet)
        if ( jodelTooLong( $BelegungsJodel . BIB_NAMEN[$libKey-1] . " | " . $lib["open"] . CLOSED ) ) {
            //Falls neuer Anhang alleine bereits zu lang (kann also gar nicht gesendet werden)
            if ( jodelTooLong( BIB_NAMEN[$libKey-1] . " | ab " . $lib["open"] . CLOSED ) ) {
                //ErrorMail senden
                sendErrorMail("Bitte Texte in Konfigurationsdatei oder JSON ändern. Der Belegungsjodel ist zu lange, um abgeschickt zu werden:\n" . BIB_NAMEN[$libKey-1] . " | ab " . $lib["open"] . CLOSED);
            //Wenn nur zusammen mit neuem Anhang zu lang für einen Jodel
            } else {
                //BelegungsJodel ohne neuen Anhang senden und wieder leeren
                sendJodel($BelegungsJodel, "06A3CB");
                $BelegungsJodel = "";
            }
        }
        //neuen Text mit Hinweis auf nächste Öffnung der Bib anhängen (nachdem entweder nicht zu lang oder vorher geleert wurde)
        $BelegungsJodel .= BIB_NAMEN[$libKey-1] . " | ab " . $lib["open"] . CLOSED;
    }
}

//BelegungsJodel absenden und leeren
sendJodel($BelegungsJodel, "06A3CB");
$BelegungsJodel = "";

?>
