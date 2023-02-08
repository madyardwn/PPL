<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<body>
  <h2 style="font-size: 30px;">Edit Data Mahasiswa</h2>
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
        <td><a href="<?php echo base_url('mahasiswa') ?>">Back</a></td>
      </tr>
    </table>
  </form>
</body>
<?php echo $this->endSection(); ?>
