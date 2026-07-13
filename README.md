# Hysenaj Galabau Webseite

Neue, unabhängige PHP-Webseite für Hysenaj Galabau aus Heilbronn. Das Projekt nutzt PHP 8.2+, HTML5, CSS3 und Vanilla JavaScript. Es enthält keine Wix-, WordPress-, React- oder Node-Abhängigkeiten und kann per SFTP/FTP auf ein normales IONOS-Webhosting hochgeladen werden.

## Struktur

- `index.php` Startseite
- `leistungen.php` Leistungsübersicht
- `ueber-uns.php` Unternehmensseite
- `galerie.php` Referenzen/Galerie
- `faq.php` FAQ
- `kontakt.php` Kontaktformular
- `bewerbung.php` Bewerbungsformular mit Datei-Upload-Prüfung
- `impressum.php` Anbieterkennzeichnung
- `datenschutz.php` Datenschutzhinweise
- `404.php` Fehlerseite
- `includes/` gemeinsame PHP-Bausteine
- `config/` zentrale Konfiguration
- `assets/` CSS, JavaScript, Bilder

## Lokales Testen

1. PHP 8.2 oder neuer installieren.
2. Im Projektordner starten:
   `php -S localhost:8080`
3. Im Browser öffnen:
   `http://localhost:8080`

Hinweis: Der Mailversand über `mail()` funktioniert lokal häufig nicht ohne zusätzliche Mail-Konfiguration. Auf IONOS muss das Kontaktformular nach dem Upload mit der echten Hosting-Umgebung getestet werden.

## IONOS-Bereitstellung

1. Repository herunterladen oder ZIP-Datei erstellen.
2. Dateien lokal entpacken.
3. `config/config.example.php` nach `config/config.php` kopieren, falls `config.php` nicht vorhanden ist.
4. In `config/config.php` Domain, Empfängeradresse und Absenderadresse prüfen.
5. Dateien per SFTP oder IONOS Webspace Explorer in das gewünschte Webverzeichnis hochladen.
6. Domain im IONOS-Control-Center mit diesem Webverzeichnis verbinden.
7. PHP 8.2 oder neuer aktivieren.
8. Schreibrechte nur dort setzen, wo sie wirklich benötigt werden. Dauerhafte öffentliche Uploads werden nicht benötigt.
9. Kontaktformular testen.
10. Bewerbungsformular und Datei-Upload mit PDF/DOC/DOCX testen.
11. HTTPS prüfen.
12. HTTP-auf-HTTPS-Weiterleitung aktivieren oder die `.htaccess`-Regel nutzen, sofern Apache diese unterstützt.
13. 404-Seite testen.
14. `sitemap.xml` bei Suchmaschinen einreichen.

## Externe Dienste, Cookies und Datenschutz

- Externe Dienste: keine aktiv eingebunden.
- Externe Schriftarten: keine. Es werden Systemschriften genutzt.
- Karten: keine Google-Maps- oder andere Karten-Einbindung.
- Tracking: kein Analytics, kein Pixel, kein Tag Manager.
- YouTube/Videos: keine Einbindung.
- Cookies: keine zustimmungspflichtigen Cookies. PHP-Sessions werden nur für CSRF-Schutz der Formulare genutzt.
- Formulardaten: Kontakt- und Bewerbungsdaten werden per E-Mail an `galabau.hysenaj@gmail.com` versendet.
- Bewerbungsdateien: werden nicht dauerhaft öffentlich im Webverzeichnis gespeichert; sie werden als E-Mail-Anhang verarbeitet.

## Übernommene Inhalte

- Firmenname: Hysenaj Galabau.
- Inhaber aus Impressum: Arben Hysenaj.
- Anschrift: Mönchseestraße 24, 74072 Heilbronn, Deutschland.
- Telefon für Kontaktseiten: +49 151 55605621.
- Telefon aus Impressum: +49 174 3796682.
- E-Mail-Adresse: galabau.hysenaj@gmail.com.
- Gründung: 2009.
- Öffnungszeiten: Montag bis Freitag 07:00-17:00 Uhr, Samstag 07:00-12:30 Uhr, Sonntag geschlossen.
- Leistungen: Abbrucharbeiten, Erd- und Pflanzarbeiten, Gartengestaltung, Gartenpflege, Natursteinmauern, Pflasterarbeiten, Pool- und Teichbau, Sichtschutz, Terrassen.
- FAQ-Inhalte zu Hauptsitz, Kosten, Leistungen, Werkzeugen/Maschinen und Subunternehmen.
- Inhaltliche Aussagen der Über-uns-Seite zu Kundenzufriedenheit, pünktlichen/sachkundigen Teammitgliedern und hochwertiger Dienstleistung.
- Bewerbungsseite mit Aussage zur Arbeit im Garten- und Landschaftsbau sowie Formularfeldern.
- Impressumsdaten einschließlich Umsatzsteuer-Identifikationsnummer.

## Sprachliche Korrekturen

- `Mönchseestrasse` wurde im sichtbaren Text zu `Mönchseestraße` vereinheitlicht.
- Tippfehler und Trennfehler wie `Gartengesta l tung`, `Informatione n`, `Ihn en` und `Ihne` wurden korrigiert.
- Umgangssprachliche FAQ-Formulierungen wie `Welche Leistungen bietet Ihr an?` wurden zu einer professionellen Sie-Ansprache geändert.
- Kontakt- und Bewerbungstexte wurden klarer, sachlicher und hochwertiger formuliert.
- Wix-spezifische Datenschutzformulierungen zu Mobile-App, Tracking-Technologien, internationalen Wix-Speicherorten und Werbediensten wurden entfernt, da sie zur neuen Webseite nicht passen.

## Bilder

Lokal übernommen und optimiert:

- `assets/images/logo-hysenaj-galabau.*`
- `assets/images/abbrucharbeiten.*`
- `assets/images/erd-und-pflanzarbeiten.*`
- `assets/images/gartengestaltung.*`
- `assets/images/gartenpflege.*`
- `assets/images/natursteinmauern.*`
- `assets/images/pflasterarbeiten.*`
- `assets/images/pool-und-teichbau.*`
- `assets/images/sichtschutz.*`
- `assets/images/terrassen.*`

Für jedes Bild gibt es JPG- und WebP-Versionen. Es wurden nur Bilder übernommen, die aus der öffentlichen bestehenden Unternehmenswebseite extrahiert werden konnten.

## Fehlende oder nicht herunterladbare Bilder

Keine der neun Leistungsbilder und das Logo waren fehlend. Die alte Startseite enthielt zusätzlich Hintergrund-/Stockbilder aus Wix/Unsplash-Kontext. Diese wurden nicht als Unternehmensreferenzen übernommen, um keine fremden Referenzprojekte zu suggerieren.

## Rechtliche Punkte vor Veröffentlichung

- Impressum durch eine fachkundige Stelle prüfen lassen, insbesondere Telefonnummern, Umsatzsteuerangabe und Bildrechte.
- Datenschutztext an die finale IONOS-, Mail- und Serverlog-Konfiguration anpassen.
- Prüfen, ob der Versand von Bewerbungsanhängen per E-Mail den internen Datenschutzanforderungen genügt. Für produktive Nutzung kann SMTP/PHPMailer mit TLS sinnvoll sein.
- Prüfen, ob zusätzliche Pflichtangaben für das konkrete Unternehmen erforderlich sind.

## Sicherheit

- CSRF-Schutz für Kontakt- und Bewerbungsformular.
- Honeypot-Spamschutz.
- Mindestabsendezeit gegen einfache Bots.
- Serverseitige Validierung und Header-Injection-Schutz.
- Upload-Prüfung nach Dateiendung, MIME-Typ und maximal 5 MB.
- Sicherheitsheader in PHP und `.htaccess`.
- Verzeichnisauflistung deaktiviert.
- Keine Zugangsdaten im Repository.

## Qualitätssicherung

Vor dem Livegang erneut prüfen:

- Alle Links und Navigation.
- Mobile Navigation.
- Pflichtfelder, Fehlermeldungen und Erfolgsmeldungen.
- E-Mail-Versand auf IONOS.
- Bewerbungs-Upload auf IONOS.
- HTTPS und HTTP-Weiterleitung.
- 404-Seite.
- `robots.txt` und `sitemap.xml`.
- Impressum und Datenschutz.
- Darstellung auf Smartphone, Tablet und Desktop.
