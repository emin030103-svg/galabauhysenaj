<?php require __DIR__ . '/includes/header.php'; ?>
<main id="main">
    <section class="hero">
        <div class="hero-media"><?= image_picture('pflasterarbeiten', 'Hochwertig ausgeführte Pflasterarbeiten von Hysenaj Galabau', 'hero-img', false) ?></div>
        <div class="container hero-content">
            <p class="eyebrow">Hysenaj Galabau seit 2009</p>
            <h1>Ihr Spezialist für Garten- und Landschaftsbau in Heilbronn und Umgebung</h1>
            <p>Wir gestalten, pflegen und bauen Außenanlagen mit handwerklicher Sorgfalt, klarer Beratung und zuverlässiger Ausführung.</p>
            <div class="button-row">
                <a class="btn primary" href="kontakt.php">Kostenlose Beratung</a>
                <a class="btn light" href="tel:<?= e($company['phone_href']) ?>">Jetzt anrufen</a>
            </div>
        </div>
    </section>

    <section class="trust-band">
        <div class="container trust-grid">
            <?php foreach (['gegründet 2009', 'langjährige Erfahrung', 'qualifizierte Mitarbeiter', 'individuelle Beratung', 'zuverlässige Ausführung', 'hohe Qualität', 'faire Preise'] as $item): ?>
                <div><?= e($item) ?></div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container section-head">
            <p class="eyebrow">Leistungen</p>
            <h2>Außenanlagen, die sauber geplant und dauerhaft ausgeführt werden.</h2>
            <a href="leistungen.php">Alle Leistungen ansehen</a>
        </div>
        <div class="container card-grid">
            <?php foreach (array_slice($services, 0, 6) as $service): ?>
                <article class="service-card">
                    <?= image_picture($service['image'], $service['alt'], '', true) ?>
                    <div>
                        <h3><?= e($service['title']) ?></h3>
                        <p><?= e($service['text']) ?></p>
                        <a href="leistungen.php#<?= e($service['slug']) ?>">Mehr erfahren</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section split muted">
        <div class="container split-grid">
            <div>
                <p class="eyebrow">Über uns</p>
                <h2>Kundenzufriedenheit steht bei uns im Mittelpunkt.</h2>
                <p>Seit der Gründung 2009 arbeitet Hysenaj Galabau sorgfältig, pünktlich und gewissenhaft. Unser Team setzt individuelle Wünsche in hochwertiger Qualität um und begleitet Projekte von der ersten Beratung bis zur fertigen Ausführung.</p>
                <a class="btn secondary" href="ueber-uns.php">Mehr über Hysenaj Galabau</a>
            </div>
            <?= image_picture('natursteinmauern', 'Natursteinmauer als hochwertiges Projekt von Hysenaj Galabau', 'rounded-img', true) ?>
        </div>
    </section>

    <section class="section">
        <div class="container section-head">
            <p class="eyebrow">Referenzen</p>
            <h2>Einblicke in ausgeführte Arbeiten.</h2>
            <a href="galerie.php">Galerie öffnen</a>
        </div>
        <div class="container gallery-strip">
            <?php foreach (['terrassen', 'pool-und-teichbau', 'sichtschutz', 'gartengestaltung'] as $img): ?>
                <?= image_picture($img, 'Projektbild von Hysenaj Galabau', '', true) ?>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="cta">
        <div class="container cta-inner">
            <div>
                <p class="eyebrow">Kostenlose Beratung</p>
                <h2>Sie planen Garten, Terrasse, Pflaster oder Pflege?</h2>
                <p>Rufen Sie uns an oder senden Sie uns eine Nachricht mit den wichtigsten Eckdaten zu Ihrem Vorhaben.</p>
            </div>
            <div class="cta-actions">
                <a href="tel:<?= e($company['phone_href']) ?>"><?= e($company['phone_display']) ?></a>
                <a href="mailto:<?= e($company['email']) ?>"><?= e($company['email']) ?></a>
                <a class="btn primary" href="kontakt.php">Zum Kontaktformular</a>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
