<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .warna-table {
            background-color: pink;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <tr>
                <?php for ($j = 1; $j <= 5; $j++) : ?>
                    <?php if ((($i % 2) === 1) xor (($j % 2) === 1)) : ?>
                        <td class="warna-table">
                        <?php else : ?>
                        <td>
                        <?php endif ?>
                        <? echo "$i,$j"; ?>
                        </td>
                    <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>