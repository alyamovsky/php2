<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>
<main>
    <h1>Новости</h1>
    <?php foreach ($news as $article): ?>
        <h3><a href="/news/one/<?= $article->id; ?>"><?= $article->title; ?></a></h3>
        <article><?= mb_strimwidth($article->text, 0, 400, ' ...'); ?>
            <p><?= $article->author->getName(); ?></p></article>
    <?php endforeach; ?>
</main>
</body>
</html>