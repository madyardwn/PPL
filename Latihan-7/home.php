<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <?php
    session_start();
    if (empty($_SESSION["login"])) {
        header("Location:index.php?error=invalid");
    }
    ?>
</head>

<body>
<table border="1" width="100%">
  <tr>
    <td colspan="3">
      <h1 align="center">Header</h1>
    </td>
  </tr>
  <tr>
    <td align="center">
      <h3>Main Content</h3>
      <img src="fahmi.jpg" width="200" height="350">
      <p>Ekspresi Anda ketika berhasil login</p>
      <a href="logout.php">Logout</a>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center">
      <p> &copy; 2023-2050 </p>
    </td>
  </tr>
</table>

</body>

</html>
