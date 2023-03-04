<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<?php $validation = \Config\Services::validation(); ?>

<h2>Edit Data Pegawai</h2>

<form action="<?php echo base_url('pegawai/update/' . $pegawai['nim']); ?>" method="post">
  <table class="table table-dark">
    <tr>
      <td class="text-light">NIM</td>
      <td><input autocomplete="off" maxlength="9" placeholder="NIM" type="text" name="nim" value="<?php echo $pegawai['nim']; ?>" class="form-control bg-dark text-light"></td>
      <td>
        <?php if ($validation->hasError('nim')) : ?>
          * <i class="text-danger"><?php echo $validation->getError('nim'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td class="text-light">Nama</td>
      <td>
        <input autocomplete="off" maxlength="32" placeholder="Nama" type="text" name="nama" value="<?php echo $pegawai['nama']; ?>" class="form-control bg-dark text-light">
      </td>
      <td>
        <?php if ($validation->hasError('nama')) : ?>
          * <i class="text-danger"><?php echo $validation->getError('nama'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td class="text-light">Gender</td>
      <td>
        <div class="form-check form-check-inline">
          <input type="radio" name="gender" value="Laki-laki" <?php echo ($pegawai['gender'] == 'Laki-laki') ? 'checked' : ''; ?> class="form-check-input border-light bg-dark">
          <label class="form-check-label text-light">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" name="gender" value="Perempuan" <?php echo ($pegawai['gender'] == 'Perempuan') ? 'checked' : ''; ?> class="form-check-input border-light bg-dark">
          <label class="form-check-label text-light">Perempuan</label>
        </div>
      </td>
      <td>
        <?php if ($validation->hasError('gender')) : ?>
          * <i class="text-danger"><?php echo $validation->getError('gender'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td class="text-light">Telepon</td>
      <td><input autocomplete="off" maxlength="12" placeholder="Telepon" type="text" name="telepon" value="<?php echo $pegawai['telepon']; ?>" class="form-control bg-dark text-light"></td>
      <td>
        <?php if ($validation->hasError('telepon')) : ?>
          * <i class="text-danger"><?php echo $validation->getError('telepon'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td class="text-light">Email</td>
      <td><input autocomplete="off" maxlength="32" placeholder="Email" type="text" name="email" value="<?php echo $pegawai['email']; ?>" class="form-control bg-dark text-light"></td>
      <td>
        <?php if ($validation->hasError('email')) : ?>
          * <i class="text-danger"><?php echo $validation->getError('email'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <!-- selection -->
      <td class="text-light">Pendidikan</td>
      <td>
        <select name="pendidikan" class="bg-dark text-light form-control">
          <option value="SD" <?php echo ($pegawai['pendidikan'] == 'SD') ? 'selected' : ''; ?>>SD</option>
          <option value="SMP" <?php echo ($pegawai['pendidikan'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
          <option value="SMA" <?php echo ($pegawai['pendidikan'] == 'SMA') ? 'selected' : ''; ?>>SMA</option>
        </select>
      </td>
      <td>
        <?php if ($validation->hasError('pendidikan')) : ?>
          * <i class="text-danger"><?php echo $validation->getError('pendidikan'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url('pegawai'); ?>" class="btn btn-secondary">Kembali</a>
      </td>
    </tr>
  </table>
</form>

<?php echo $this->endSection(); ?>
