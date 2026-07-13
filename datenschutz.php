<?php require __DIR__ . '/includes/header.php'; ?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Datenschutz</p>
            <h1>Datenschutzerklärung.</h1>
            <p>Diese Hinweise sind auf die neu erstellte PHP-Webseite ohne Wix, Tracking, externe Schriftarten, Google Maps oder Cookies zugeschnitten.</p>
        </div>
    </section>
    <section class="section legal">
        <div class="container narrow">
            <h2>Verantwortlicher</h2>
            <p><?= e($company['owner']) ?><br><?= e($company['trade']) ?><br><?= e($company['street']) ?><br><?= e($company['postal_city']) ?><br>E-Mail: <a href="mailto:<?= e($company['email']) ?>"><?= e($company['email']) ?></a></p>
            <h2>Hosting und Server-Logfiles</h2>
            <p>Beim Aufruf dieser Webseite verarbeitet der Hosting-Anbieter technisch notwendige Zugriffsdaten, etwa IP-Adresse, Datum und Uhrzeit, aufgerufene Seite, übertragene Datenmenge, Browser- und Betriebssysteminformationen. Die Verarbeitung dient der sicheren und stabilen Bereitstellung der Webseite.</p>
            <h2>Kontaktformular</h2>
            <p>Wenn Sie das Kontaktformular nutzen, verarbeiten wir die von Ihnen eingegebenen Daten wie Name, E-Mail-Adresse, Telefonnummer, Adresse, Betreff, Unternehmen und Nachricht, um Ihre Anfrage zu beantworten. Die Übermittlung erfolgt per E-Mail an Hysenaj Galabau.</p>
            <h2>Bewerbungsformular</h2>
            <p>Bei Bewerbungen verarbeiten wir Angaben wie Name, Geburtsdatum, Adresse, Mobilnummer, gewünschte Arbeitsstelle, frühestes Startdatum, E-Mail-Adresse, Nachricht und den hochgeladenen Lebenslauf. Der Lebenslauf wird als E-Mail-Anhang versendet und nicht dauerhaft öffentlich im Webverzeichnis gespeichert.</p>
            <h2>Cookies und externe Dienste</h2>
            <p>Diese neue Webseite setzt keine zustimmungspflichtigen Cookies, kein Tracking, keine externen Schriftarten, keine Google-Maps-Einbindung und keine YouTube-Einbettungen ein. Ein Cookie-Hinweis ist deshalb technisch nicht erforderlich.</p>
            <h2>Rechtsgrundlagen</h2>
            <p>Die Verarbeitung erfolgt je nach Vorgang auf Grundlage von Art. 6 Abs. 1 lit. b DSGVO zur Bearbeitung vorvertraglicher oder vertraglicher Anfragen, Art. 6 Abs. 1 lit. f DSGVO für den sicheren Betrieb der Webseite sowie Art. 6 Abs. 1 lit. a DSGVO, sofern eine Einwilligung abgefragt wird.</p>
            <h2>Speicherdauer</h2>
            <p>Personenbezogene Daten werden nur so lange gespeichert, wie dies für Bearbeitung, Nachweiszwecke oder gesetzliche Pflichten erforderlich ist.</p>
            <h2>Ihre Rechte</h2>
            <p>Sie haben das Recht auf Auskunft, Berichtigung, Löschung, Einschränkung der Verarbeitung, Datenübertragbarkeit und Widerspruch. Außerdem können Sie sich bei einer Datenschutzaufsichtsbehörde beschweren.</p>
            <h2>Hinweis zur Prüfung</h2>
            <p>Diese Datenschutzerklärung ersetzt keine Rechtsberatung. Vor Veröffentlichung sollte sie fachlich auf die endgültige Hosting- und Mail-Konfiguration geprüft werden.</p>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
