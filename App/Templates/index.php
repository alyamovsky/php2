<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>
<main>
<h1>Новости</h1>
<?php foreach ($data as $article): ?>
    <h3><a href="/article.php?id=<?= $article->id; ?>"><?= $article->title; ?></a></h3>
<article><?= mb_strimwidth($article->text, 0, 400, ' ...'); ?></article>
<?php endforeach; ?>
</main>
</body>
</html>