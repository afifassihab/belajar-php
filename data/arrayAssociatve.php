<?php
$students = [
    [
        "nama" => "M Afif Syihabuddin",
        "email" => "afifassihab@gmail.com",
        "nrp" => 32008976785,
        "jurusan" => "Teknik Informatika",
        "gambar" => "2.jpg"
    ],
    [
        "nama" => "Fitrotul Inayah",
        "email" => "fitrotulinayah@gmail.com",
        "nrp" => 3300973637,
        "jurusan" => "Desain Komunikasi Visual",
        "gambar" => "5.jpg"
    ]
];
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
    <h1>Daftar Siswa</h1>
    <?php foreach ($students as $student) : ?>
        <ul>
            <img src="img/<?php echo $student["gambar"] ?>" alt="">
            <li><?php echo $student["nama"] ?></li>
            <li><?php echo $student["email"] ?></li>
            <li><?php echo $student["nrp"] ?></li>
            <li><?php echo $student["jurusan"] ?></li>
        </ul>
    <?php endforeach ?>
</body>

</html>