<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<body>
    <form action="<?php echo base_url('mahasiswa/search') ?>" method="post">
        <input type="text" name="keyword" id="keyword" placeholder="Search" autocomplete="off">
        <button type="submit" name="submit">Search</button>
        <a href="<?php echo base_url('mahasiswa') ?>"><button type="button">Clear</button></a>
    </form>

    <br>

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
                        <a href="<?php echo base_url('mahasiswa/show/' . $mhs['nim']) ?>">Detail</a>
                        <a href=" <?php echo base_url('mahasiswa/edit/' . $mhs['nim']) ?>">Edit</a>
                        <a href="<?php echo base_url('mahasiswa/delete/' . $mhs['nim']) ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="<?php echo base_url('mahasiswa/create') ?>">Tambah Data</a>
</body>

<?php echo $this->endSection(); ?>
