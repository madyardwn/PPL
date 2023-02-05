<?php

// koneksi database
$username = "root";
$password = "";
$server = "localhost";
$db = "akademik";

$conn = mysqli_connect($server, $username, $password, $db);

if ($conn) {
    // get form data
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    // validate and sanitize the input

    // insert data into the database
    $sql = "INSERT INTO mahasiswa (nim, nama, umur) VALUES ('$nim', '$nama', '$umur')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "Data inserted successfully";
    } else {
        echo "Data insertion failed";
    }
} else {
    echo "Connection Failed";
}
header("Location: index.php");

?>
