<?php
require("functions.php");

if (isset($_POST["register"])) {
    register($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>

<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirm Password</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button name="register">Register</button>
            </li>
        </ul>
    </form>
</body>

</html>