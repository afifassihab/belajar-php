<?php
if (
    !isset($_GET["nama"]) ||
    !isset($_GET["nrp"]) ||
    !isset($_GET["email"]) ||
    !isset($_GET["jurusan"]) ||
    !isset($_GET["gambar"])
) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>Detail Student</h1>
    <ul>
        <img src="img/<?= $_GET["gambar"] ?>" alt="">
        <li><?= $_GET["nama"] ?></li>
        <li><?= $_GET["email"] ?></li>
        <li><?= $_GET["nrp"] ?></li>
        <li><?= $_GET["jurusan"] ?></li>
    </ul>
</body>

</html>