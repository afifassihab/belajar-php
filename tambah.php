<?php
require("functions.php");

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {

    if (tambah($_POST)) {
        echo "
            <script>
                alert('Data Berhasil disimpan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal disimpan');
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert data</title>
    <style>
        body {
            display: flex;
            width: 100%;
            align-items: center;
            flex-direction: column;
        }

        label {
            width: 10rem;
            display: inline-block;
        }
    </style>
</head>

<body>

    <h1>Masukkan Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nrp">NRP:</label>
        <input type="text" name="nrp" id="nrp"><br><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama"><br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email"><br><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan"><br><br>

        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar"><br><br>

        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>

</html>