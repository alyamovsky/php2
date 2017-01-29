<?php include __DIR__ . '/admin_header.php'; ?>

    <h1><a href="/admin/index.php">Админ-панель</a> / Добавить запись</h1>
    <form method="post" action="/admin/index.php?action=Add">
        <table class="create">
            <tr>
                <td align="right">Название:</td>
                <td width="90%"><input class="i" type="text" required name="title"/></td>
            </tr>
            <tr>
                <td align="right">Текст:</td>
                <td><textarea class="i" required rows="10" name="text"></textarea></td>
            </tr>
            <tr>
                <td align="right">Автор:</td>
                <td><select name="author_id">
                        <?php foreach ($authors as $value): ?>
                            <option value="<?= $value->id; ?>"><?= $value->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Добавить"/>
                </td>
            </tr>
        </table>
    </form>
    <h1>Редактирование записей</h1>
<?php foreach ($news as $value) : ?>
    <p><a href="/admin?action=Edit&id=<?= $value->id; ?>"><?= $value->title; ?></a></p>
<?php endforeach; ?>

<?php include __DIR__ . '/admin_footer.php'; ?>