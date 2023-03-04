<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<div class="row mb-3 mt-3 justify-content-between bg-dark text-white">
  <div class="col-md-4">
    <a href="<?php echo base_url('pegawai/create') ?>" class="fa fa-plus btn btn-primary"> Tambah Data</a>
  </div>
  <div class="col-md-4">
    <form action="<?php echo base_url('pegawai') ?>" method="get">
      <div class="input-group">
        <input type="text" class="form-control  bg-dark text-white" placeholder="Cari data pegawai" name="keyword">
        <button class="fa fa-search btn btn-secondary" type="submit" name="submit"></button>
      </div>
    </form>
  </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
  <i>* <?php echo session()->getFlashdata('pesan'); ?></i>
<?php endif; ?>

<table class=" table table-dark table-striped table-bordered text-center" style="width:100%">
  <thead class="table-light">
    <tr>
      <th class="bg-secondary text-white">NIM</th>
      <th class="bg-secondary text-white">Nama</th>
      <th class="bg-secondary text-white">Gender</th>
      <th class="bg-secondary text-white">Telepon</th>
      <th class="bg-secondary text-white">Email</th>
      <th class="bg-secondary text-white">Pendidikan</th>
      <th class="bg-secondary text-white">Aksi</th>
    </tr>
  </thead>
  <tbody class="table-dark">
    <?php foreach ($pegawai as $pgw) : ?>
      <tr>
        <td><?php echo $pgw['nim'] ?></td>
        <td><?php echo $pgw['nama'] ?></td>
        <td><?php echo $pgw['gender'] ?></td>
        <td><?php echo $pgw['telepon'] ?></td>
        <td><?php echo $pgw['email'] ?></td>
        <td><?php echo $pgw['pendidikan'] ?></td>
        <td>
          <a href="<?php echo base_url('pegawai/show/' . $pgw['nim']); ?>" class="fa fa-eye btn btn-info"></a>
          <a href="<?php echo base_url('pegawai/edit/' . $pgw['nim']); ?>" class="fa fa-edit btn btn-warning"></a>
          <a href="<?php echo base_url('pegawai/delete/' . $pgw['nim']); ?>" class="fa fa-trash btn btn-danger" onclick="return confirm('Apakah anda yakin?')"></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo $pager->links('pegawai', 'v_pagination'); ?>

<?php echo $this->endSection(); ?>
