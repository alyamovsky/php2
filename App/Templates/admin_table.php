<table>
    <?php foreach ($models as $value) : ?>
        <tr>
            <?php foreach ($functions as $function) : ?>
                <td>
                    <?php echo $function($value); ?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>