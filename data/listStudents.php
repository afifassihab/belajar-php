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
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($students as $student) : ?>
            <li>
                <a href="detailStudent.php?nama=<?= $student["nama"] ?>&email=<?= $student["email"] ?>&nrp=<?= $student["nrp"] ?>&jurusan=<?= $student["jurusan"] ?>&gambar=<?= $student["gambar"] ?>">
                    <?= $student["nama"] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>