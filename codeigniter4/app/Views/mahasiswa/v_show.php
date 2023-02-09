<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<h1>Detail Mahasiswa</h1>

<table>
  <tr>
    <td>NIM</td>
    <td>:</td>
    <td><?php echo $mahasiswa['nim']; ?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $mahasiswa['nama']; ?></td>
  </tr>
  <tr>
    <td>Umur</td>
    <td>:</td>
    <td><?php echo $mahasiswa['umur']; ?></td>
  </tr>
</table>

<a href="<?php echo base_url('mahasiswa') ?>"><button>Back</button></a>

<?php echo $this->endSection(); ?>
