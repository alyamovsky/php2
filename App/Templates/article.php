<?php include __DIR__ . '/header.php'; ?>
<h1><a href="/">Главная</a> / <?= $article->title; ?></h1>
<article><?= $article->text; ?>
    <p><?= $article->author->getName(); ?></p></article>
</main>
</body>
</html>