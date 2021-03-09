<?php
require("functions.php");

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// mendapatkan data dari database berdasarkan id
$id = $_GET["id"];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// ubah data
if (isset($_POST['submit'])) {

    if (ubah($_POST)) {
        echo "
            <script>
                alert('Berhasil!');
                document.location.href = 'index.php';
            </script>   
        ";
    } else {
        echo "
            <script>
                alert('Error!');
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
    <!-- <script>alert()</script> -->
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
        <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
        <input type="hidden" name="gambarLama" value="<?= $mahasiswa['gambar'] ?>">

        <label for="nrp">NRP:</label>
        <input type="text" name="nrp" id="nrp" value="<?= $mahasiswa['nrp'] ?>"><br><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?= $mahasiswa['nama'] ?>"><br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?= $mahasiswa['email'] ?>"><br><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" value="<?= $mahasiswa['jurusan'] ?>"><br><br>

        <label for="gambar">Gambar:</label>
        <div>
            <img src="img/<?= $mahasiswa['gambar'] ?>" width="100px"><br>
            <input type="file" name="gambar" id="gambar">
        </div><br><br>

        <button type="submit" name="submit" value="<?= $mahasiswa['nama'] ?>">Tambah Data</button>
    </form>
</body>

</html>