<?php require __DIR__ . '/includes/header.php'; ?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Galerie</p>
            <h1>Projektbilder und Referenzen.</h1>
            <p>Ausgewählte Bilder der öffentlich sichtbaren bestehenden Unternehmenswebseite, lokal gespeichert und für die neue Webseite optimiert.</p>
        </div>
    </section>
    <section class="section">
        <div class="container gallery-grid">
            <?php foreach ($services as $service): ?>
                <figure>
                    <?= image_picture($service['image'], $service['alt'], '', true) ?>
                    <figcaption><?= e($service['title']) ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
