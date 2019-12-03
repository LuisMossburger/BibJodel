<?php

//Konfigurationsdatei für Bibstatus-Jodel

//WORDING
define("LOW", "Frei!"); //kaum belegt, Alternativen z.B. "30%", "[##....]"
define("MID", "Mittel!"); //mäßig belegt, Alternativen z.B. "60%", "[####..]"
define("HIGH", "Fast voll!"); //stark belegt, Alternativen z.B. "90%", "[#####.]"
//"ab UHRZEIT" wird immer ausgegeben, folgende Konstante ergänzt den Text
//Standardmäßig würde hier z.B. "ab UHRZEIT wieder für dich da!" ausgegeben werden
define("CLOSED", " wieder für dich da!"); //Text für Schließzeit
define("EVENT", "Event"); //Wort für "Event"
//Namen der Lesesäle (muss Reihenfolge & Anzahl der Bibs in libs.json entsprechen)
define("BIB_NAMEN", array("TB1", "TB2", "TB3", "TB4", "TB5", "TB6"));
//Namen der Eventkategorien (muss mit möglichen Kategorien im JSON übereinstimmen, nach dieser Ordnung werden Events ausgegeben)
define("EVENT_KATS", array("Teilbibliothek 1", "Teilbibliothek 2", "Teilbibliothek 3", "Teilbibliothek 4", "Teilbibliothek 5", "Teilbibliothek 6"));

//DATEN
define("JSON_FILE", "./data/libs.json"); //Pfad zur JSON-Datei mit den Lesesaaldaten
define("JSON_FILE_EVENTS", "./data/events.json"); //Pfad zur JSON-Datei mit den Eventdaten

//JODEL
define("CHANNEL", "bibstatus_test"); //Hier den Channelnamen der jeweiligen Stadt eintragen
define("API_KEY", ""); //der API-Key zum Posten in Jodel (über Jodel anfordern, siehe Handbuch)
define("JODEL_ZEICHEN", 240); //NICHT ÄNDERN: Zeichengrenze pro Jodel

//ERROR MAILS
define("MAIL_ADRESSE", ""); //Mailadresse, an die Errormails geschickt werden sollen
define("MAIL_BETREFF", "Jodel-Status Error"); //Betreff für Errormails

 ?>
