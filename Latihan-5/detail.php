<?php
// koneksi database
$username = "root";
$password = "";
$server = "localhost";
$db = "akademik";

$conn = mysqli_connect($server, $username, $password, $db);

if ($conn) {
    // echo "Connection Successful";
} else {
    echo "Connection Failed";
}

    $nim = $_GET['nim'];
    $sql = "SELECT * FROM mahasiswa WHERE nim = '{$nim}'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
?>

<html>
<head>
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h1>Detail Mahasiswa</h1>
    <table>
        <tr>
            <td>NIM</td>
            <td><?= $data['nim'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= $data['nama'] ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?= $data['umur'] ?></td>
        </tr>
    </table>

    <form action="index.php">
        <input type="submit" value="Back">
    </form>
</body>
</html>
