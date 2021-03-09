<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $gambar = $_POST['gambar'];


    // SYNTAKS GAGAL 1
    // $query = "INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    // $query = "INSERT INTO mahasiswa VALUES ('', $nama, $nrp, $email, $jurusan, $gambar)";
    // $query = "INSERT INTO mahasiswa VALUES(NULL, $nama, $nrp, $email, $jurusan, $gambar)";
    // $query = "INSERT INTO mahasiswa ('id','nama','nrp','email','jurusan','gambar') VALUES(NULL,'$nama','$nrp','$email','$jurusan','$gambar')";
    // $query = "INSERT INTO mahasiswa ('id','nama','nrp','email','jurusan','gambar') VALUES("",'$nama','$nrp','$email','$jurusan','$gambar')";
    // $query = "INSERT INTO 'mahasiswa' ('id','nama','nrp','email','jurusan','gambar') VALUES (NULL,'$nama','$nrp','$email','$jurusan','$gambar')";

    // SYNTAX GAGAL 2
    // $query = "INSERT INTO 'mahasiswa' ('id','nama','nrp','email','jurusan','gambar') VALUES (NULL,$nama,$nrp,$email,$jurusan,$gambar)";
    // $query = "INSERT INTO mahasiswa ('id','nama','nrp','email','jurusan','gambar') VALUES (NULL,$nama,$nrp,$email,$jurusan,$gambar)";
    // $query = "INSERT INTO mahasiswa (id,nama,nrp,email,jurusan,gambar) VALUES (NULL,$nama,$nrp,$email,$jurusan,$gambar)";
    // $query = "INSERT INTO 'mahasiswa' ('nama','nrp','email','jurusan','gambar') VALUES ($nama,$nrp,$email,$jurusan,$gambar)";

    // SYNTAX GAGAL 3
    // $query = "INSERT INTO 'mahasiswa' ('id','nama','nrp','email','jurusan','gambar') VALUES (default,$nama,$nrp,$email,$jurusan,$gambar)";
    // $query = "insert into 'mahasiswa' values (default,$nama,$nrp,$email,$jurusan,$gambar)";

    // SYNTAX GAGAL 4
    // $query = "INSERT INTO 'mahasiswa' ('nama', 'nrp', 'email', 'jurusan', 'gambar') VALUES ('$nama', '$nrp', '$jurusan', '$email', '$gambar')";
    // $query = "INSERT INTO `mahasiswa` (`nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES ($nama, $nrp, $jurusan, $email, $gambar)";
    // $query = "INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES (NULL, $nama', '$nrp', '$jurusan', '$email', '$gambar')";
    // $query = "INSERT INTO `mahasiswa` (`nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES (`$nama`, `$nrp`, `$jurusan`, `$email`, `$gambar`)";
    // $query = "INSERT INTO mahasiswa VALUES ('$nama', '$nrp', '$jurusan', '$email', '$gambar')";
    // $query = "INSERT INTO mahasiswa (id, nama, nrp, email, jurusan, gambar) VALUES (NULL, '$nama', '$nrp', '$jurusan', '$email', '$gambar')";
    // $query = 'INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar) VALUES ($nama, $nrp, $jurusan, $email, $gambar)';



    // SYINTAX BERHASIL
    // $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar) VALUES ('$nama', '$nrp', '$jurusan', '$email', '$gambar')";
    // $query = "INSERT INTO `mahasiswa` (`nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES ('$nama', '$nrp', '$jurusan', '$email', '$gambar')";
    // $query = "INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES (NULL, '" . $nama . "', '" . $nrp . "', '" . $email . "', '" . $jurusan . "', '" . $gambar . "')";




    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo "Data Berhasil di simpan";
    } else {
        echo "Periksa inputan dan Coba Lagi";
    }
}
