<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2 style="font-size: 30px;">Edit Data Mahasiswa</h2>
  <br />
  <br />
  <form action="<?php echo base_url('mahasiswa/update') ?>" method="post">
    <table>
      <tr>
        <td>NIM</td>
        <td><input type="text" name="nim" value="<?php echo $mahasiswa['nim'] ?>" readonly></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value="<?php echo $mahasiswa['nama'] ?>"></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td><input type="text" name="umur" value="<?php echo $mahasiswa['umur'] ?>"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Simpan"></td>
      </tr>
    </table>
  </form>
</body>

</html>
