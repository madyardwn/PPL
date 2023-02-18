<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<h1><?php echo $title ?></h1>

<?php if (session()->getFlashdata('pesan')) : ?>
  <i>* <?php echo session()->getFlashdata('pesan'); ?></i>
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
      <th>Aksi</th>
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
        <td>
          <a href="<?php echo base_url('pegawai/show/' . $pgw['nim']) ?>">Detail</a>
          <a href="<?php echo base_url('pegawai/edit/' . $pgw['nim']) ?>">Edit</a>
          <a href="<?php echo base_url('pegawai/delete/' . $pgw['nim']) ?>">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
<a href="<?php echo base_url('pegawai/create') ?>">Tambah Data</a>

<?php echo $this->endSection(); ?>
