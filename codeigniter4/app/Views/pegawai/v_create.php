<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>
<h2>Tambah Data Pegawai</h2>
<?php if (session()->getFlashdata('error')) : ?>
  <div>
    <i>*<?php echo session()->getFlashdata('error'); ?></i>
  </div>
<?php endif; ?>

<form action="<?php echo base_url('pegawai/store') ?>" method="post">
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
      <td>Gender</td>
      <td>
        <label><input type="radio" name="gender" value="Laki-laki">Laki-Laki</label>
        <label><input type="radio" name="gender" value="Perempuan">Perempuan</label>
      </td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td><input autocomplete="off" maxlength="12" placeholder="Telepon" type="text" name="telepon"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input autocomplete="off" maxlength="32" placeholder="Email" type="email" name="email"></td>
    </tr>
    <tr>
      <!-- selection -->
      <td>Pendidikan</td>
      <td>
        <select name="pendidikan">
          <option value="">Pilih</option>
          <option value="SD">SD</option>
          <option value="SMP">SMP</option>
          <option value="SMA">SMA</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Simpan"></td>
      <td><a href="<?php echo base_url('pegawai') ?>"><button type="button">Back</button></a></td>
    </tr>
  </table>
</form>

<?php echo $this->endSection(); ?>
