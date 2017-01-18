<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ-панель</title>
    <style>
        td {
            vertical-align: top;
        }

        .create {
            width: 50%;
        }

        .i {
            width: 100%;
        }

    </style>
</head>
<body>

<h1><a href="/admin/index.php">Админ-панель</a> / <?php if (isset($id)) :?>Редактировать<?php else : ?>Добавить<?php endif; ?> запись</h1>
<form method="post" action="/admin/add_edit.php">
    <table class="create">
        <tr>
            <td align="right">Название:</td>
            <td width="90%"><input class="i" value="<?php if (isset($title)) :?><?= $title; ?><?php endif; ?>" type="text" required name="title"/></td>
        </tr>
        <tr>
            <td align="right">Текст:</td>
            <td><textarea class="i" required rows="10" name="text"><?php if (isset($text)) :?><?= $text; ?><?php endif; ?></textarea></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php if (isset($id)) :?><?= $id; ?><?php endif; ?>"</td>
            <td><input type="submit" value="<?php if (isset($id)) :?>Редактировать<?php else : ?>Добавить<?php endif; ?>"/>
                <?php if (isset($id)) :?><input type="submit" name="delete" value="Удалить"><?php endif; ?></td>
        </tr>
    </table>
</form>
<h1>Редактирование записей</h1>
<?php foreach ($data as $value) : ?>
    <p><a href="/admin/index.php?id=<?= $value->id; ?>"><?= $value->title; ?></a></p>
<?php endforeach; ?>
</body>
</html>