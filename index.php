<?php
require("functions.php");

// cek jika belum login tendang ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET["keyword"])) {
    setcookie("keyword", "", time() - 3600);
}

$totalHalaman = 3;
$halamanActive = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$startFrom = ($halamanActive - 1) * $totalHalaman;
$limit = "ORDER BY nama ASC LIMIT $startFrom, $totalHalaman";
$query2 = "SELECT * FROM mahasiswa ";


// jika tombol cari ditekan set keyword ke cookie
if (isset($_POST['keyword'])) {
    setcookie("keyword", $_POST["keyword"], time() + 600);
    $keywordCookie = isset($_POST["keyword"]) ? $_POST["keyword"] : $_COOKIE['keyword'];
    header("Location: ?halaman=1&keyword=$keywordCookie");
}

// jika pencet cari maka arahkan ke cari
if (isset($_COOKIE["keyword"]) || isset($_POST['keyword'])) {
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : $_COOKIE["keyword"];
    $query1 = "SELECT * FROM mahasiswa WHERE 
                nama LIKE '%$keyword%' OR 
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'    
            ";
    $mahasiswa = query($query1 . $limit);
} else {
    $mahasiswa = query($query2 . $limit);
}

$query = isset($_COOKIE["keyword"]) ? $query1 : $query2;
$totalRows = getTotalRows($query);
$totalPagenation = ceil($totalRows / $totalHalaman);

if (!isset($_GET["keyword"])) {
    $keyword = "";
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        .active {
            background-color: red;
            color: white;
            padding: 2px;
        }
    </style>
</head>

<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Insert Data Mahasiswa</a>

    <form action="" method="post">
        <input type="text" name="keyword" value="<?= isset($keyword) ? $keyword : "" ?>">
        <a href="index.php">
            <button type="submit">Cari</button>
        </a>
    </form> <br>

    <?php for ($i = 1; $i <= $totalPagenation; $i++) : ?>
        <?php if ($i == $halamanActive) : ?>
            <a href="?halaman=<?= $i ?><?= isset($_COOKIE["keyword"]) ? '&keyword=' . $_COOKIE["keyword"] : '' ?>" class="active"><?= $i ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i ?><?= isset($_COOKIE["keyword"]) ? '&keyword=' . $_COOKIE["keyword"] : '' ?>"><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = $startFrom + 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?id=<?= $mhs['id'] ?>">Ubah</a>/
                    <a href="delete.php?id=<?= $mhs['id'] ?>" onclick="return confirm('Apakah anda yakin menghapus data?')">Hapus</a>
                </td>
                <td><img src="img/<?= $mhs["gambar"] ?>" width="50"></td>
                <td><?= $mhs["nrp"] ?></td>
                <td><?= $mhs["nama"] ?></td>
                <td><?= $mhs["email"] ?></td>
                <td><?= $mhs["jurusan"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ?>
    </table>
</body>

</html>