<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<h1>Detail Pegawai</h1>

<table>
  <tr>
    <td>NIM</td>
    <td>:</td>
    <td><?php echo $pegawai['nim']; ?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $pegawai['nama']; ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td><?php echo $pegawai['gender']; ?></td>
  </tr>
  <tr>
    <td>Telepon</td>
    <td>:</td>
    <td><?php echo $pegawai['telepon']; ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td>:</td>
    <td><?php echo $pegawai['email']; ?></td>
  </tr>
  <tr>
    <td>Pendidikan</td>
    <td>:</td>
    <td><?php echo $pegawai['pendidikan']; ?></td>
  </tr>
</table>

<a href="<?php echo base_url('pegawai') ?>"><button>Back</button></a>

<?php echo $this->endSection(); ?>
