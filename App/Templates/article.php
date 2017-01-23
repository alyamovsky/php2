<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data->title; ?></title>
</head>
<body>
<h1><a href="/index.php">Главная</a> / <?= $data->title; ?></h1>
<article><?= $data->text; ?>
<p><?= $data->author->getName(); ?></p></article>
</body>
</html>