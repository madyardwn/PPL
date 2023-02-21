<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<form action="<?php echo base_url('pegawai') ?>" method="get">
  <input type="text" name="keyword" placeholder="Cari NIM, Nama, dll." value="<?php echo $keyword ?>" autocomplete="off">
  <button type="submit">Cari</button>
  <a href="<?php echo base_url('pegawai') ?>"><button type="button">Clear</button></a>
</form>

<br>

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
          <a href="<?php echo base_url('pegawai/show/' . $pgw['nim']) ?>"><button type="button">Detail</button></a>
          <a href="<?php echo base_url('pegawai/edit/' . $pgw['nim']) ?>"><button type="button">Edit</button></a>
          <a href="<?php echo base_url('pegawai/delete/' . $pgw['nim']) ?>"><button type="button">Delete</button></a>
        </td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td colspan="7">
        <div class="pagination">
          <?php echo $pager->simplelinks('pegawai'); ?>
        </div>
      </td>
    </tr>
  </tbody>
</table>
<br>
<a href="<?php echo base_url('pegawai/create') ?>">+ Tambah Data</a>

<?php echo $this->endSection(); ?>