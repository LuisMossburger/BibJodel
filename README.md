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
Außerdem muss bei The Jodel Venture GmbH ein API-Key angefordert, der Kontakt wird gerne vermittelt.<br>
Für kleinere Bibliotheken wäre es weniger Aufwand "manuell" über ein Handy zu jodeln - Jodel ist und bleibt absolut anonym, es spielt also keine Rolle, von welchem Handy aus gejodelt wird.
<br><br>

<b>Einblick</b><br>
<img src="https://github.com/LuisMossburger/BibJodel/blob/master/src/img/jodelBelegung.jpeg" width=300px>
<img src="https://github.com/LuisMossburger/BibJodel/blob/master/src/img/jodelEvents.jpeg" width=300px>
<br><br><br>
BibJodel entstand in Zusammenarbeit mit der <a href="https://www.uni-bamberg.de/ub/" target="_blank">Universitätsbibliothek Bamberg</a> und <a href="https://jodel.com/de/imprint/" target="_blank">The Jodel Venture GmbH</a>.
<br><br><br>

<b>FAQs</b><br>
<b>Ist BibJodel mit einem Konto in sozialen Netzwerken vergleichbar?</b><br>
Nein, Jodel ist kein soziales Netzwerk im klassischen Sinn. Alle Jodel sind anonym, das jodeln von persönlichen Daten wird ausdrücklich nicht gewünscht. Daher braucht eine Bibliothek auch kein Konto, sondern nur den API-Key. BibJodel verbessert, ohne viel Aufwand, das Nutzererlebnis
der Studierenden in der Stadt!<br><br>
<b>Unsere Bibliothek erfasst Lesesaaldaten nicht in JSON, können wir BibJodel trotzdem einsetzen?</b><br>
Ja! Die Datenhaltung ist vorerst egal, wichtig ist nur, dass diese Daten in JSON konvertiert werden, damit BibJodel sie lesen kann. Das braucht normalerweise nur wenige Zeilen Code. Am besten an den ITler des Vertrauens wenden ;)<br><br>
<b>Unsere Bibliothek hat nur einen Lesesaal, lohnt es sich BibJodel einzusetzen?</b><br>
Es lohnt sich auf jeden Fall Daten über den Lesesaal zu jodeln - BibJodel ist aber vielleicht nicht die beste Lösung, vor allem wenn keine automatischen
Daten über die Belegung erfasst werden. Einfacher wäre es, auf einem Handy Jodel zu installieren und "manuell" zu jodeln.<br><br>
<b>Kann ich die Posts farblich an unser Corporate Design anpassen?</b><br>
Nein, denn nur wenige Farben sind in Jodel für die Posts "legal", diese sollten im Quelltext nicht geändert werden.
