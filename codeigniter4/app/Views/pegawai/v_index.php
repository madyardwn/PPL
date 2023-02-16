<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<body>
  <?php if (session()->getFlashdata('error')) : ?>
    <div>
      <i>*<?php echo session()->getFlashdata('error'); ?></i>
    </div>
  <?php elseif (session()->getFlashdata('success')) : ?>
    <div>
      <i>*<?php echo session()->getFlashdata('success'); ?></i>
    </div>
  <?php endif; ?>

  <table class="table" border="1">
    <thead>
      <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Pendidikan</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pegawai as $pgw) : ?>
        <tr>
          <td><?php echo $pgw['nim'] ?></td>
          <td><?php echo $pgw['nama'] ?></td>
          <td><?php echo $pgw['gender'] ?></td>
          <td><?php echo $pgw['telepon'] ?></td>
          <td><?php echo $pgw['email'] ?></td>
          <td><?php echo $pgw['pendidikan'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br>
  <a href="<?php echo base_url('pegawai/create') ?>">Tambah Data</a>
</body>

<?php echo $this->endSection(); ?>
