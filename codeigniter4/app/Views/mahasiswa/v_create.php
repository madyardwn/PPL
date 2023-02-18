<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>
<h2>Tambah Data Mahasiswa</h2>

<?php $validation = \Config\Services::validation(); ?>

<form action="<?php echo base_url('mahasiswa/store') ?>" method="post">
  <table>
    <tr>
      <td>NIM</td>
      <td><input autocomplete="off" maxlength="9" placeholder="NIM" type="text" name="nim"></td>
      <td>
        <?php if ($validation->getError('nim')) { ?>
          <i>* <?php echo $error = $validation->getError('nim'); ?></i>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input autocomplete="off" maxlength="32" placeholder="Nama" type="text" name="nama"></td>
      <td>
        <?php if ($validation->getError('nama')) { ?>
          <i>* <?php echo $error = $validation->getError('nama'); ?></i>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td>Umur</td>
      <td><input autocomplete="off" maxlength="2" placeholder="Umur" type="text" name="umur"></td>
      <td>
        <?php if ($validation->getError('umur')) { ?>
          <i>* <?php echo $error = $validation->getError('umur'); ?></i>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="Simpan">
        <span></span>
        <a href="<?php echo base_url('mahasiswa') ?>"><button type="button">Back</button>
      </td>
    </tr>
  </table>
</form>
<?php echo $this->endSection(); ?>
