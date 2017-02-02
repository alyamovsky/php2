<?php include __DIR__ . '/header.php'; ?>
    <h1><?= $title ?? 'Новости'; ?></h1>
<?php foreach ($news as $article): ?>
    <h3><a href="/news/one/?id=<?= $article->id; ?>"><?= $article->title; ?></a></h3>
    <article><?= mb_strimwidth($article->text, 0, 400, ' ...'); ?>
        <p><?= $article->author->getName(); ?></p></article>
<?php endforeach; ?>
<?php include __DIR__ . '/footer.php'; ?>