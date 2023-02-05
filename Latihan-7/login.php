<?php
//koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$database = "db_supermarket";

$conn = mysqli_connect($host, $user, $pass, $database);

$username = $_POST["username"];
$password = md5($_POST["password"]);

$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='" . $username . "' AND password='" . $password . "'");

$result = mysqli_fetch_array($query);
$jumlah_result = mysqli_num_rows($query);

if ($jumlah_result == 0) {
    header("Location:index.php?error=login");
} elseif ($result["username"] == $username && $result["password"] == $password) {
    session_start();
    $_SESSION["username"] = $result["username"];
    $_SESSION["login"] = $result["username"] . date('Y-m-d H:i:s');
    header("Location:home.php");
}
