<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Detail Mahasiswa</h1>
      <table class="table table-bordered">
        <tr>
          <td class="bg-secondary text-white">NIM</td>
          <td class="text-white"><?php echo $mahasiswa['nim']; ?></td>
        </tr>
        <tr>
          <td class="bg-secondary text-white">Nama</td>
          <td class="text-white"><?php echo $mahasiswa['nama']; ?></td>
        </tr>
        <tr>
          <td class="bg-secondary text-white">Umur</td>
          <td class="text-white"><?php echo $mahasiswa['umur']; ?></td>
        </tr>
      </table>
      <a href="<?php echo base_url('mahasiswa'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>

<?php echo $this->endSection(); ?>
