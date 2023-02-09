<?php echo $this->extend('layout/v_template'); ?>

<?php echo $this->section('content'); ?>

<body>
    <table class="table" border="1" style="font-size: 20px;">
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
                        <button><a href=" <?php echo base_url('mahasiswa/edit/' . $data['nim']) ?>">Edit</a></button>
                        <button><a href=" <?php echo base_url('mahasiswa/delete/' . $data['nim']) ?>">Delete</a></button>
                        <button><a href=" <?php echo base_url('mahasiswa/detail/' . $data['nim']) ?>">Detail</a></button>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td><input type="text" name="nim" id="nim" size="10px"></td>
                <td><input type="text" name="nama" id="nama" size="30px"></td>
                <td><input type="text" name="umur" id="umur" size="5px"></td>
                <td><button onclick="sendData()" style="width: 100%;">Tambah</button></td>
            </tr>
        </tbody>
    </table>
    <script>
        function sendData() {
            var nim = document.getElementById("nim").value;
            var nama = document.getElementById("nama").value;
            var umur = document.getElementById("umur").value;

            // Menggunakan metode AJAX untuk mengirim data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo base_url('mahasiswa/add') ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("nim=" + nim + "&nama=" + nama + "&umur=" + umur);
            window.location.href = "<?php echo base_url('mahasiswa') ?>";
        }
    </script>
</body>

<?php echo $this->endSection(); ?>
