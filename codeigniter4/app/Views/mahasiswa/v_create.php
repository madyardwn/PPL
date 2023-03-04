<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>
<h2>Tambah Data Mahasiswa</h2>

<?php $validation = \Config\Services::validation(); ?>

<form action="<?php echo base_url('mahasiswa/store') ?>" method="post">
  <table class="table table-dark">
    <tr>
      <td>NIM</td>
      <td><input autocomplete="off" maxlength="9" placeholder="NIM" type="text" name="nim" class="form-control bg-dark text-white"></td>
      <td>
        <?php if ($validation->getError('nim')) { ?>
          <i class="text-danger"><?php echo $error = $validation->getError('nim'); ?></i>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input autocomplete="off" maxlength="32" placeholder="Nama" type="text" name="nama" class="form-control bg-dark text-white"></td>
      <td>
        <?php if ($validation->getError('nama')) { ?>
          <i class="text-danger"><?php echo $error = $validation->getError('nama'); ?></i>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td>Umur</td>
      <td><input autocomplete="off" maxlength="2" placeholder="Umur" type="text" name="umur" class="form-control bg-dark text-white"></td>
      <td>
        <?php if ($validation->getError('umur')) { ?>
          <i class="text-danger"><?php echo $error = $validation->getError('umur'); ?></i>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" class="btn btn-primary" value="Simpan">
        <a href="<?php echo base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
      </td>
    </tr>
  </table>
</form>
<?php echo $this->endSection(); ?>
