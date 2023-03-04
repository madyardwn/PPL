<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<?php $validation = \Config\Services::validation(); ?>

<h2>Edit Data Mahasiswa</h2>
<form action="<?php echo base_url('mahasiswa/update/' . $mahasiswa['nim']) ?>" method="post">
  <table class="table table-dark">
    <tr>
      <td>NIM</td>
      <td><input maxlength="9" autocomplete="off" type="text" name="nim" value="<?php echo $mahasiswa['nim'] ?>" class="form-control bg-dark text-white"></td>
      <td>
        <?php if ($validation->getError('nim')) { ?>
          <i>* <?php echo $error = $validation->getError('nim'); ?></i>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input maxlength="32" autocomplete="off" type="text" name="nama" value="<?php echo $mahasiswa['nama'] ?>" class="form-control bg-dark text-white"></td>
      <td>
        <?php if ($validation->getError('nama')) { ?>
          <i>* <?php echo $error = $validation->getError('nama'); ?></i>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td>Umur</td>
      <td><input maxlength="2" autocomplete="off" type="text" name="umur" value="<?php echo $mahasiswa['umur'] ?>" class="form-control bg-dark text-white"></td>
      <td>
        <?php if ($validation->getError('umur')) { ?>
          <i>* <?php echo $error = $validation->getError('umur'); ?></i>
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
