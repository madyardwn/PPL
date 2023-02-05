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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
<style>
        .table {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <table class="table" border="1">
        <thead>
            <h1>Data Mahasiswa</h1> 
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM mahasiswa";
            $query = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $data['nim'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['umur'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
