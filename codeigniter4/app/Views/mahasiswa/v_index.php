<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<form action="<?php echo base_url('mahasiswa/search') ?>" method="post">
    <input type="text" name="keyword" id="keyword" placeholder="Search" autocomplete="off">
    <button type="submit" name="submit">Search</button>
    <a href="<?php echo base_url('mahasiswa') ?>"><button type="button">Clear</button></a>
</form>
<br>

<a href="<?php echo base_url('mahasiswa/create') ?>">+ Tambah Data</a>
<br>

<?php if (session()->getFlashdata('pesan')) : ?>
    <i>* <?php echo session()->getFlashdata('pesan'); ?></i>
<?php endif; ?>

<table class="table" border="1">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?php echo $mhs['nim'] ?></td>
                <td><?php echo $mhs['nama'] ?></td>
                <td><?php echo $mhs['umur'] ?></td>
                <td>
                    <a href="<?php echo base_url('mahasiswa/show/' . $mhs['nim']) ?>"><button type="button">Detail</button></a>
                    <a href=" <?php echo base_url('mahasiswa/edit/' . $mhs['nim']) ?>"><button type="button">Edit</button></a>
                    <a href="<?php echo base_url('mahasiswa/delete/' . $mhs['nim']) ?>"><button type="button">Delete</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">
                <div class="pagination">
                    <?php echo $pager->simplelinks('mahasiswa'); ?>
                </div>
            </td>
        </tr>
    </tbody>
</table>



<?php echo $this->endSection(); ?>
