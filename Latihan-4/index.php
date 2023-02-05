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
    form {
      width: 50%;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
    
    label {
      font-weight: bold;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
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
                <th>Action</th>
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
                    <td>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='nim' value='<?= $data['nim'] ?>'>
                            <input type='submit' name='delete' value='Delete'>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <form action="submit.php" method="post">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim"><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>
        <label for="umur">Umur:</label>
        <input type="text" id="umur" name="umur"><br>
        <!-- -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>
