<?php
$db = mysqli_connect("localhost", "root", "", "phpdasar");
session_start();


function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $db;

    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = upload();

    // jika upload gagal jangan teruskan ke database
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar) VALUES ('$nama', '$nrp', '$jurusan', '$email', '$gambar')";


    $result = mysqli_query($db, $query);

    return $result;
}

function ubah($data)
{
    global $db;

    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambarLama = htmlspecialchars($data['gambarLama']);
    $id = $data['id'];

    // jika gambar tidak diupload set ke gambar lama
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }



    $query = "UPDATE mahasiswa SET 
                nama ='$nama', 
                nrp = '$nrp', 
                gambar = '$gambar', 
                jurusan = '$jurusan', 
                email = '$email' 
            WHERE id = $id";

    $result = mysqli_query($db, $query);

    return $result;
}

function delete($id)
{
    global $db;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($db, $query);

    return $result;
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE 
                nama LIKE '%$keyword%' OR 
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'    
            ";

    return query($query);
}

function upload()
{
    $image = $_FILES["gambar"];
    $name = $image["name"];
    $tmpName = $image["tmp_name"];
    $isError = $image["error"];
    $size = $image["size"];

    // cek jika gambar tidak diupload
    if ($isError === 4) {
        echo "
            <script>
                alert('Upload gambar dulu!')
            </script>
        ";
        return false;
    }

    // cek jika gambar bukan png, jpg, atau jpeg
    $allowedExtensions = ["png", "jpg", "jpeg"];
    $extension = strtolower(explode(".", $name)[1]);
    $isExtensionValid = in_array($extension, $allowedExtensions);

    if (!$isExtensionValid) {
        echo "
            <script>
                alert('Ekstensi tidak valid!')
            </script>
        ";
        return false;
    }

    // cek jika gambar lebih besar dari 200KB
    if ($size > 200000) {
        echo "
            <script>
                alert('Gambar kebesaran!')
            </script>
        ";
        return false;
    }

    // generate new image name by unique id
    $uniqueId = uniqid();
    $newImageName = $uniqueId . "." . $extension;
    // var_dump($newImageName);
    // die;

    // pindah gambar dari temporary folder ke target folder
    move_uploaded_file($tmpName, "img/" . $newImageName);


    return $newImageName;
}

function register($data)
{
    global $db;

    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    // cek jika username ada yang sama
    $resultUsername = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_row($resultUsername)) {
        echo "
            <script>
                alert('Username sudah dipakai!')
            </script>
        ";
        return false;
    }


    // cek jika password beda
    if ($password !== $password2) {
        echo "
            <script>
                alert('Password harus sama!')
            </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($db, $query);

    return $result;
}

function login($data)
{
    global $db;


    $username = $data["username"];
    $password = $data["password"];

    // mendapatkan data user dari database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    // cek jika username tidak terdaftar
    if ($user === null) {
        echo "
            <script>
                alert('Username tidak terdaftar!')
            </script>
        ";
        return false;
    }

    // cek jika password salah
    if (!password_verify($password, $user["password"])) {
        echo "
            <script>
                alert('Password salah!')
            </script>
        ";
        return false;
    }

    // jika remember me dicentang set cookie
    if ($data["remember"]) {
        setcookie("id", $user["id"], time() + 60);
        setcookie("key", hash("sha256", $user["username"]), time() + 60);
    }

    // jika berhasil set session dan redirect ke halaman home
    $_SESSION["login"] = true;
    header("Location: index.php");

    return true;
}

function getTotalRows($query)
{
    global $db;

    $totalRows = count(query($query));

    return $totalRows;
}
