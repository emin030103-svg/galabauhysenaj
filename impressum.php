<?php require __DIR__ . '/includes/header.php'; ?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Impressum</p>
            <h1>Anbieterkennzeichnung.</h1>
        </div>
    </section>
    <section class="section legal">
        <div class="container narrow">
            <h2>Angaben gemäß § 5 TMG</h2>
            <p><?= e($company['owner']) ?><br><?= e($company['trade']) ?><br><?= e($company['street']) ?><br><?= e($company['postal_city']) ?><br><?= e($company['country']) ?></p>
            <p>Telefon: <a href="tel:<?= e($company['imprint_phone_href']) ?>"><?= e($company['imprint_phone_display']) ?></a><br>E-Mail: <a href="mailto:<?= e($company['email']) ?>"><?= e($company['email']) ?></a></p>
            <h2>Umsatzsteuer-ID</h2>
            <p>Umsatzsteuer-Identifikationsnummer nach § 27a Umsatzsteuergesetz: <?= e($company['tax_id']) ?></p>
            <h2>Bildrechte</h2>
            <p>Verwendet werden lokal gespeicherte Bilder, die von der bisherigen öffentlichen Unternehmenswebseite übernommen wurden. Ehemalige Wix- oder Unsplash-Hinweise sollten vor Veröffentlichung fachlich geprüft werden, da auf dieser neuen Webseite keine Wix-Systembestandteile eingebunden sind.</p>
            <h2>Online-Streitbeilegung</h2>
            <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung bereit: <a href="https://ec.europa.eu/consumers/odr/" rel="noopener">https://ec.europa.eu/consumers/odr/</a>. Unsere E-Mail-Adresse lautet <?= e($company['email']) ?>.</p>
            <p>Wir sind nicht bereit und nicht verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
            <h2>Haftung für Inhalte</h2>
            <p>Die Inhalte dieser Webseite wurden mit größtmöglicher Sorgfalt erstellt. Für Richtigkeit, Vollständigkeit und Aktualität der Inhalte übernehmen wir jedoch keine Gewähr.</p>
            <h2>Haftung für Links</h2>
            <p>Diese Webseite kann Links zu externen Webseiten enthalten. Für deren Inhalte sind ausschließlich die jeweiligen Betreiber verantwortlich.</p>
            <h2>Urheberrecht</h2>
            <p>Die auf dieser Webseite veröffentlichten Inhalte und Werke unterliegen dem deutschen Urheberrecht. Jede nicht zugelassene Verwertung bedarf der vorherigen schriftlichen Zustimmung des jeweiligen Rechteinhabers.</p>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
