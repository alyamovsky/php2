<?php include __DIR__ . '/admin_header.php'; ?>

<h1><a href="/admin/index.php">Админ-панель</a> / Редактировать запись</h1>
<form method="post" action="/admin/add_edit.php">
    <table class="create">
        <tr>
            <td align="right">Название:</td>
            <td width="90%"><input class="i" value="<?php if (isset($title)) : ?><?= $title; ?><?php endif; ?>" type="text" required name="title"/></td>
        </tr>
        <tr>
            <td align="right">Текст:</td>
            <td><textarea class="i" required rows="10" name="text"><?php if (isset($text)) : ?><?= $text; ?><?php endif; ?></textarea></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php if (isset($id)) : ?><?= $id; ?><?php endif; ?>"</td>
            <td><input type="submit" value="Редактировать"/>
                <input type="submit" name="delete" value="Удалить"></td>
        </tr>
    </table>
</form>
<h1>Редактирование записей</h1>
<?php foreach ($data as $value) : ?>
    <p><a href="/admin/edit.php?id=<?= $value->id; ?>"><?= $value->title; ?></a></p>
<?php endforeach; ?>

<?php include __DIR__ . '/admin_footer.php'; ?>
