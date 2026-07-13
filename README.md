# Hysenaj Galabau Webseite

Dieses Repository enthält zwei Varianten der Webseite:

- Statische GitHub-Pages-Vorschau mit `index.html` und `.html`-Unterseiten
- PHP-Version für IONOS mit Kontakt- und Bewerbungsformularen

Die GitHub-Pages-Veröffentlichung unter `https://emin030103-svg.github.io/galabauhysenaj/` lädt jetzt eine echte gestaltete Webseite statt der README.

## GitHub Pages

Aktuell ist ein Root-Fallback vorhanden, damit GitHub Pages auch dann funktioniert, wenn die Quelle noch auf dem Repository-Root steht:

- `index.html`
- `leistungen.html`
- `ueber-uns.html`
- `galerie.html`
- `faq.html`
- `kontakt.html`
- `bewerbung.html`
- `impressum.html`
- `datenschutz.html`
- `assets/css/styles.css`
- `assets/js/main.js`

Der Ordner `docs/` ist lokal vorbereitet und kann als bevorzugte Pages-Quelle genutzt werden: Branch `main`, Ordner `/docs`.

## IONOS

Die PHP-Version bleibt im Repository erhalten. Für IONOS sollte PHP 8.2 oder neuer aktiv sein. Vor dem Livegang `config/config.example.php` nach `config/config.php` kopieren und Mail-/Domainwerte prüfen.

## Hinweise

Die statische GitHub-Pages-Version zeigt Kontakt- und Bewerbungsformulare nur als Vorschau. Die echte Verarbeitung erfolgt ausschließlich in der PHP-Version auf IONOS.
