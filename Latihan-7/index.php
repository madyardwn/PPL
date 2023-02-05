<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <?php
    session_start();
    if (!empty($_SESSION["login"])) {
        header("Location:home.php");
    }
    ?>
</head>

<body>
    <center>
        <form method="post" action="login.php">
            <h1>Login</h1>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" id="username" placeholder="username" size="30"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id="password" placeholder="password" size="30"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="login" id="login" value="Submit"></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        } else {
            $error = "";
        }

        $pesan = "";

        if ($error == "login") {
            $pesan = "Username dan Password yang anda masukan salah";
        }
        if ($error == "invalid") {
            $pesan = "Anda harus login";
        }
        echo $pesan;
        ?>
    </center>
</body>

</html>