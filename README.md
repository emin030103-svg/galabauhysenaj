# Hysenaj Galabau Webseite

Vollständige lokale Neuumsetzung der Website für Hysenaj Galabau mit zwei Varianten:

- `docs/`: statische HTML-Version für GitHub Pages
- Hauptverzeichnis: PHP-Version für IONOS-Webhosting

## Projektstruktur

- `docs/index.html` ist die Startseite für GitHub Pages.
- `docs/*.html` sind die statischen Unterseiten.
- `index.php`, `leistungen.php`, `ueber-uns.php`, `galerie.php`, `faq.php`, `kontakt.php`, `bewerbung.php`, `impressum.php`, `datenschutz.php` bilden die PHP-Version.
- `includes/` enthält Header, Footer, Daten und Funktionen.
- `config/config.example.php` enthält die zentrale Formular-Konfiguration.
- `assets/css/styles.css` ist die zentrale CSS-Datei.
- `assets/js/main.js` enthält Navigation, Galerie, Lightbox, Karten-Zustimmung und statische Formularhinweise.

## Lokales Testen

Statisch: `docs/index.html` im Browser öffnen oder im Projektordner `python -m http.server 4177` starten.

PHP: PHP 8.2 oder neuer verwenden und im Projektordner `php -S localhost:8080` starten.

## GitHub Pages

GitHub Pages auf Branch `main` und Ordner `/docs` stellen. Die Datei `docs/.nojekyll` ist vorhanden. Innerhalb der statischen Version zeigen interne Links auf `.html`-Dateien und verwenden relative Pfade.

## IONOS

Für IONOS die PHP-Dateien im Hauptverzeichnis hochladen. `config/config.example.php` nach Bedarf als Vorlage für `config/config.php` verwenden. Empfängeradresse: `galabau.hysenaj@gmail.com`.

## Übernommene Inhalte

Übernommen beziehungsweise inhaltlich modernisiert wurden Firmenname, Inhaber Arben Hysenaj, Anschrift Mönchseestraße/Mönchseestrasse 24, 74072 Heilbronn, Telefonnummern, E-Mail-Adresse, Öffnungszeiten, Gründungsjahr 2009, Leistungen, FAQ-Grundinhalte, Bewerbungsformularfelder, Impressumsdaten und vorhandene lokale Unternehmensbilder.

## Bilder

Verwendet werden ausschließlich die lokal vorhandenen Bilder unter `assets/images/` inklusive WebP-Versionen. Keine dauerhaften Wix-Hotlinks sind eingebunden. Weitere nicht eindeutig als Unternehmensreferenzen nutzbare Stock-/Wix-Kontextbilder wurden nicht als Referenzen übernommen.

## Sprachliche und technische Änderungen

Texte wurden professioneller formuliert, Tippfehler korrigiert und in eine einheitliche Sie-Ansprache gebracht. Die Website nutzt semantisches HTML, Vanilla JavaScript, ein zentrales CSS-System, responsive Navigation, Lightbox, Galerie-Filter, statische Formularhinweise und PHP-Formularverarbeitung.

## Rechtliche Hinweise

Impressum und Datenschutzerklärung wurden aus den vorhandenen Angaben abgeleitet und an die neue technische Umsetzung angepasst. Vor Veröffentlichung müssen beide Texte fachlich/rechtlich durch den Betreiber geprüft werden.

## Externe Dienste

Keine Analytics- oder Tracking-Dienste. Die Kontaktseite nutzt eine Zwei-Klick-Kartenlösung: externe Karteninhalte werden erst nach Klick geladen. PHP-Sessions dienen dem CSRF-Schutz.
