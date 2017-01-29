<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data->title; ?></title>
</head>
<body>
<h1><a href="/">Главная</a> / <?= $article->title; ?></h1>
<article><?= $article->text; ?>
    <p><?= $article->author->getName(); ?></p></article>
</body>
</html>