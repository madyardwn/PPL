<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Detail Pegawai</h1>
      <table class="table table-bordered">
        <tr>
          <td class="bg-secondary text-white">NIM</td>
          <td class="text-white"><?php echo $pegawai['nim']; ?></td>
        </tr>
        <tr>
          <td class="bg-secondary text-white">Nama</td>
          <td class="text-white"><?php echo $pegawai['nama']; ?></td>
        </tr>
        <tr>
          <td class="bg-secondary text-white">Gender</td>
          <td class="text-white"><?php echo $pegawai['gender']; ?></td>
        </tr>
        <tr>
          <td class="bg-secondary text-white">Telepon</td>
          <td class="text-white"><?php echo $pegawai['telepon']; ?></td>
        </tr>
        <tr>
          <td class="bg-secondary text-white">Email</td>
          <td class="text-white"><?php echo $pegawai['email']; ?></td>
        </tr>
        <tr>
          <td class="bg-secondary text-white">Pendidikan</td>
          <td class="text-white"><?php echo $pegawai['pendidikan']; ?></td>
        </tr>
      </table>
      <a href="<?php echo base_url('pegawai'); ?>" class="btn btn-primary">Kembali</a>
    </div>
  </div>
</div>

<?php echo $this->endSection(); ?>
