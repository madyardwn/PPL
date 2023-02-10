<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>
<h2>Tambah Data Mahasiswa</h2>
<?php if (session()->getFlashdata('error')) : ?>
  <div>
    <i>* <?php echo session()->getFlashdata('error'); ?></i>
  </div>
<?php endif; ?>

<form action="<?php echo base_url('mahasiswa/store') ?>" method="post">
  <table>
    <tr>
      <td>NIM</td>
      <td><input autocomplete="off" maxlength="9" placeholder="NIM" type="text" name="nim"></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input autocomplete="off" maxlength="32" placeholder="Nama" type="text" name="nama"></td>
    </tr>
    <tr>
      <td>Umur</td>
      <td><input autocomplete="off" maxlength="2" placeholder="Umur" type="text" name="umur"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Simpan"></td>
      <td><a href="<?php echo base_url('mahasiswa') ?>"><button type="button">Back</button></a></td>
    </tr>
  </table>
</form>


<?php echo $this->endSection(); ?>
