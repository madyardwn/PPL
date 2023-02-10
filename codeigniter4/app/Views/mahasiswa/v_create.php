<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>
<form action="<?php echo base_url('mahasiswa/store') ?>" method="post">
  <table>
    <tr>
      <td>NIM</td>
      <td><input type="text" name="nim"></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input type="text" name="nama"></td>
    </tr>
    <tr>
      <td>Umur</td>
      <td><input type="text" name="umur"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Simpan"></td>
    </tr>
  </table>
</form>
<?php echo $this->endSection(); ?>
