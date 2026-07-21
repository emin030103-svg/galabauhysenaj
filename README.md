# Hysenaj Galabau – Firmenwebsite

Website für den Garten- und Landschaftsbaubetrieb **Hysenaj Galabau** (Heilbronn), umgesetzt als Kundenprojekt.

> **Hinweis:** Dies ist eine echte Kundenwebsite. Firmenname, Leistungen, Texte und Bilder gehören dem Betreiber. Der Quellcode liegt hier als Arbeitsprobe im Portfolio; Inhalte sind nicht zur freien Weiterverwendung gedacht (siehe [Lizenz](#lizenz)).

## Screenshots

| Startseite | Leistungen |
| --- | --- |
| _[Platzhalter – startseite.png]_ | _[Platzhalter – leistungen.png]_ |

## Verwendete Technologien

- HTML5, CSS3 (ein zentrales Stylesheet, kein Framework)
- Vanilla JavaScript (Navigation, Galerie-Filter, Lightbox)
- PHP 8 (Formularverarbeitung, CSRF-Schutz, Security-Header) für die produktive Version
- Responsive Design, `<picture>`/WebP für Bilder

## Projektstruktur

Das Projekt gibt es in zwei Varianten für zwei unterschiedliche Hosting-Ziele:

```
├── docs/               # Statische HTML-Version für GitHub Pages (Demo/Vorschau)
│   ├── *.html
│   └── assets/
├── *.php               # PHP-Version für den produktiven Betrieb (IONOS-Webhosting)
├── includes/           # Header, Footer, Navigation, gemeinsame PHP-Funktionen
├── config/             # config.example.php als Vorlage; config.php liegt nur lokal/auf dem Server
└── assets/             # CSS, JS und Bilder für die PHP-Version
```

Beide Varianten zeigen dieselben Inhalte, sind aber unabhängig voneinander lauffähig: `docs/` ist rein statisch, die PHP-Version verarbeitet zusätzlich das Kontaktformular serverseitig.

## Lokale Nutzung

Statische Version:
```bash
cd docs
python -m http.server 4177
```

PHP-Version (benötigt PHP 8.2+):
```bash
php -S localhost:8080
```
Vor dem ersten Start `config/config.example.php` nach `config/config.php` kopieren und bei Bedarf anpassen.

## Deployment

- **GitHub Pages:** Branch `main`, Ordner `/docs`.
- **Produktivbetrieb:** PHP-Dateien im Hauptverzeichnis, gehostet bei IONOS.

## Sicherheit

- Security-Header (`X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`) in `includes/functions.php` und `.htaccess`.
- CSRF-Token für das Kontaktformular.
- `config/config.php` ist über `.gitignore` von der Versionierung ausgeschlossen und enthält keine Zugangsdaten, nur die Empfänger-Mailadresse des Formulars.

## Lizenz

Kein Open-Source-Projekt. Der Quellcode dient als Arbeitsprobe im Portfolio; Inhalte, Bilder und Markenzeichen gehören dem Betreiber (Hysenaj Galabau).
