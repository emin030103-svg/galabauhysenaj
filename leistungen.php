<?php require __DIR__ . '/includes/header.php'; ?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Leistungen</p>
            <h1>Garten- und Landschaftsbau aus einer Hand.</h1>
            <p>Von der ersten Beratung bis zur zuverlässigen Ausführung: Hysenaj Galabau übernimmt Arbeiten rund um private Gärten, Außenanlagen, Wege, Terrassen und Pflegeflächen.</p>
        </div>
    </section>
    <section class="section">
        <div class="container service-list">
            <?php foreach ($services as $service): ?>
                <article class="service-row" id="<?= e($service['slug']) ?>">
                    <?= image_picture($service['image'], $service['alt'], '', true) ?>
                    <div>
                        <p class="eyebrow">Hysenaj Galabau</p>
                        <h2><?= e($service['title']) ?></h2>
                        <p><?= e($service['text']) ?> Wir besprechen die Anforderungen vor Ort, stimmen Material und Ausführung ab und setzen die Arbeiten mit qualifizierten Mitarbeitern um.</p>
                        <a class="btn secondary" href="kontakt.php">Beratung anfragen</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
