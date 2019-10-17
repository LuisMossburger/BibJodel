# BibJodel
BibJodel ist ein Tool, mit dem Informationen über die Lesesaalauslastung und -öffnung, z.B. aus einer "Lesesaalampel", automatisch in der Studierendenapp <a href="https://jodel.com/" target="_blank">Jodel</a> gepostet werden können.
<br><br>
<b>Warum?</b><br>
In fast jeder größeren Stadt gibt es einen "bibstatus"-Channel, in dem sich Studierende gegenseitig schreiben, wie voll die Bib gerade ist - nicht sehr regelmäßig, denn wer macht sich diesen Aufwand schon?
<br>Bibliotheken machen sich diese Arbeit schon, viele haben Lesesaalampeln oder ähnliche Systeme. Warum diese Info also nicht in Jodel posten? Besserer Service für die Studierenden, besseres Image für Bibliotheken, Win-Win!
<br><br>
<b>Wie?</b><br>
Je nach cronjob, werden die Infos von BibJodel ausgelesen und im Channel gepostet. Formulierungen, Teilbibliotheksnamen etc. sind in der Konfigurationsdatei anpassbar. Damit ist für die Studierenden einsehbar, ob sie momentan einen freien Platz finden bzw. wann der Lesesaal wieder öffnet. Zusätzlich gibt es ein Script, das die Events des heutigen Tages postet, beispielsweise Führungen.
<br><br>
<b>Voraussetzungen?</b><br>
BibJodel kann von jeder Bibliothek eingesetzt werden, die Daten zur Lesesaalbelegung erhebt. Voraussetzung sowohl für Belegung, als auch Events ist, dass diese Daten regelmäßig in JSON konvertiert werden, da BibJodel mit diesem Format arbeitet.<br>
Außerdem muss bei The Jodel Venture GmbH ein API-Key angefordert, der Kontakt wird gerne vermittelt.
<br><br>
<b>Einblick</b><br>
<img src="https://github.com/LuisMossburger/BibJodel/blob/master/jodelBelegung.jpeg" width=300px>
<img src="https://github.com/LuisMossburger/BibJodel/blob/master/jodelEvents.jpeg" width=300px>
<br><br><br>
BibJodel entstand in Zusammenarbeit mit der Universitätsbibliothek Bamberg und The Jodel Venture GmbH.
