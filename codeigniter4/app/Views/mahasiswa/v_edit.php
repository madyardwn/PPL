<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<body>
  <h2>Edit Data Mahasiswa</h2>
  <?php if (session()->getFlashdata('error')) : ?>
    <div>
      <i>*<?php echo session()->getFlashdata('error'); ?></i>
    </div>
  <?php endif; ?>
  <form action="<?php echo base_url('mahasiswa/update/' . $mahasiswa['nim']) ?>" method="post">
    <table>
      <tr>
        <td>Nama</td>
        <td><input maxlength="32" autocomplete="off" type="text" name="nama" value="<?php echo $mahasiswa['nama'] ?>"></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td><input maxlength="2" autocomplete="off" type="text" name="umur" value="<?php echo $mahasiswa['umur'] ?>"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Simpan"></td>
        <td><a href="<?php echo base_url('mahasiswa') ?>"><button type="button">Back</button></a></td>
      </tr>
    </table>
  </form>
</body>
<?php echo $this->endSection(); ?>
