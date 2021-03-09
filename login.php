<?php
require("functions.php");
$db = mysqli_connect("localhost", "root", "", "phpdasar");

// cek jika cookie id ada
if (isset($_COOKIE["id"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // dapatkan  username dari database sesuai id
    $result = mysqli_query($db, "SELECT username FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
    $username = $row["username"];

    // cek jika username yang dienkripsi sama dengan key lalu set session ke true
    if (hash("sha256", $username) === $key) {
        $_SESSION["login"] = true;
    }
}

// jika session login bernilai true maka tendang user ke home
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// jika tombol login ditekan jalankan fungsi login()
if (isset($_POST["login"])) {
    login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <H1>Halaman Login</H1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username</label>
                <input type="username" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" id="remember">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>