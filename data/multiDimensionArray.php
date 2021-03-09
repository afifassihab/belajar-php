<?php
$numbers = [[1, 2, 3], [4, 5, 6], [7, 8, 9]]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
        }

        .kotak {
            background-color: salmon;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            margin: 3px;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <?php foreach ($numbers as $number) : ?>
        <div class="container">
            <?php foreach ($number as $num) : ?>
                <div class="kotak"> <?php echo $num ?> </div>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>
</body>

</html>