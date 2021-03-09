<?php
if (isset($_POST["submit"])) {
    if (
        $_POST["username"] == "admin" &&
        $_POST["password"] == "123"
    ) {
        header("location: admin.php");
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
    <h1>Login Admin</h1>
    <?php if (isset($error)) : ?>
        <p>Username atau Password salah</p>
    <?php endif ?>
    <ul>
        <form action="" method="post">
            <li>
                <label for="username">Username: </label>
                <input type="text" id="username" name="username">
            </li>
            <li>
                <label for="password">Password: </label>
                <input type="password" id="password" name="password">
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </form>
    </ul>
</body>

</html>