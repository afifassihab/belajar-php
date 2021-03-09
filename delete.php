<?php
require("functions.php");

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (delete($_GET["id"])) {
    echo "
        <script>
            alert('Data Berhasil dihapus!')
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal dihapus!')
            document.location.href = 'index.php';
        </script>
    ";
}
