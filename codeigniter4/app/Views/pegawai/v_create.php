<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<h2>Tambah Data Pegawai</h2>

<?php $validation = \Config\Services::validation(); ?>

<?php if (session()->getFlashdata('pesan')) : ?>
  <div class="alert alert-success" role="alert">
    <?php echo session()->getFlashdata('pesan'); ?>
  </div>
<?php endif; ?>

<form action="<?php echo base_url('pegawai/store') ?>" method="post">
  <table>
    <tr>
      <td>NIM</td>
      <td><input autocomplete="off" maxlength="9" placeholder="NIM" type="text" name="nim" value="<?php echo isset($_POST['nim']) ? $_POST['nim'] : ''; ?>"></td>
      <td>
        <?php if ($validation->hasError('nim')) : ?>
          * <i><?php echo $validation->getError('nim'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>
        <input autocomplete="off" maxlength="25" placeholder="Nama" type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>">
      </td>
      <td>
        <?php if ($validation->hasError('nama')) : ?>
          * <i><?php echo $validation->getError('nama'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>
        <label><input type="radio" name="gender" value="Laki-laki" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Laki-laki') ? 'checked' : ''; ?>>Laki-Laki</label>
        <label><input type="radio" name="gender" value="Perempuan" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Perempuan') ? 'checked' : ''; ?>>Perempuan</label>
      </td>
      <td>
        <?php if ($validation->hasError('gender')) : ?>
          * <i><?php echo $validation->getError('gender'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td><input autocomplete="off" maxlength="15" placeholder="Telepon" type="text" name="telepon" value="<?php echo isset($_POST['telepon']) ? $_POST['telepon'] : ''; ?>"></td>
      </td>
      <td>
        <?php if ($validation->hasError('telepon')) : ?>
          * <i><?php echo $validation->getError('telepon'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input autocomplete="off" maxlength="32" placeholder="Email" type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"></td>
      </td>
      <td>
        <?php if ($validation->hasError('email')) : ?>
          * <i><?php echo $validation->getError('email'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <!-- selection -->
      <td>Pendidikan</td>
      <td>
        <select name="pendidikan">
          <option value="" disabled selected>Pilih Pendidikan</option>
          <option value="SD" <?php echo (isset($_POST['pendidikan']) && $_POST['pendidikan'] == 'SD') ? 'selected' : ''; ?>>SD</option>
          <option value="SMP" <?php echo (isset($_POST['pendidikan']) && $_POST['pendidikan'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
          <option value="SMA" <?php echo (isset($_POST['pendidikan']) && $_POST['pendidikan'] == 'SMA') ? 'selected' : ''; ?>>SMA</option>
        </select>
      </td>
      </td>
      <td>
        <?php if ($validation->hasError('pendidikan')) : ?>
          * <i><?php echo $validation->getError('pendidikan'); ?></i>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="Simpan">
        <span></span>
        <a href="<?php echo base_url('pegawai') ?>"><button type="button">Back</button></a>
      </td>
    </tr>
  </table>
</form>
<?php echo $this->endSection(); ?>
