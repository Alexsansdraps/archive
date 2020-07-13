<?php if (isset($_SESSION['flash'])) : ?>

    <?php foreach ($_SESSION['flash'] as $flash) : ?>
        <div class="alert alert-<?= $flash['type']; ?>">
            <?= $flash['content']; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>

<?php endif; ?>