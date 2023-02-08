<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<body>
    <h2 style="font-size: 30px;">Data Mahasiswa</h2>
    <table class="table" border="2" style="font-size: 20px;">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($mahasiswa as $data) {
                ?>
                <tr>
                    <td><?php echo $data['nim'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['umur'] ?></td>
                    <td>
                        <a href="<?php echo base_url('mahasiswa/edit/' . $data['nim']) ?>">Edit</a>
                        <a href="<?php echo base_url('mahasiswa/delete/' . $data['nim']) ?>">Delete</a>
                        <a href="<?php echo base_url('mahasiswa/detail/' . $data['nim']) ?>">Detail</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <form action="<?php echo base_url('mahasiswa/add') ?>" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="text" name="umur"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>

<?php echo $this->endSection(); ?>
