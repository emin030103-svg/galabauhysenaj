<?php require __DIR__ . '/includes/header.php'; ?>
<main id="main">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">FAQ</p>
            <h1>Häufige Fragen.</h1>
            <p>Antworten zu Hauptsitz, Kosten, Leistungen, Ausrüstung und Arbeitsweise.</p>
        </div>
    </section>
    <section class="section">
        <div class="container faq-list">
            <?php foreach ($faqs as $faq): ?>
                <details>
                    <summary><?= e($faq['q']) ?></summary>
                    <p><?= e($faq['a']) ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
