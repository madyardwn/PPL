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
            <?php echo session()->getFlashdata('error'); ?>
        </div>
    <?php elseif (session()->getFlashdata('success')) : ?>
        <div>
            <i>*<?php echo session()->getFlashdata('success'); ?></i>
        </div>
    <?php endif; ?>
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
            if (isset($mahasiswa)) {
                foreach ($mahasiswa as $data) {
                    ?>
                    <tr>
                        <td id="nim<?php echo $data['nim'] ?>"><?php echo $data['nim'] ?></td>
                        <td id="nama<?php echo $data['nim'] ?>"><?php echo $data['nama'] ?></td>
                        <td id="umur<?php echo $data['nim'] ?>"><?php echo $data['umur'] ?></td>
                        <td>
                            <button id="btnEdit<?php echo $data['nim'] ?>" onclick="showEditForm(<?php echo $data['nim'] ?>)">Edit</button>
                            <a href=" <?php echo base_url('mahasiswa/show/' . $data['nim']) ?>"><button>Detail</button></a>
                            <a href=" <?php echo base_url('mahasiswa/delete/' . $data['nim']) ?>"><button>Delete</button></a>
                        </td>
                    </tr>
                    <tr id="editForm<?php echo $data['nim'] ?>" style="display:none;">
                        <td><?php echo $data['nim'] ?></td>
                        <td><input autocomplete="off" maxlength="32" placeholder="Nama" type="text" name="nama" id="nama<?php echo $data['nim'] ?>" value="<?php echo $data['nama'] ?>" size="30px"></td>
                        <td><input autocomplete="off" maxlength="2" placeholder="Umur" type="text" name="umur" id="umur<?php echo $data['nim'] ?>" value="<?php echo $data['umur'] ?>" size="5px"></td>
                        <td>
                            <button onclick="updateData(<?php echo $data['nim'] ?>)" style="width: 48%;">Update</button>
                            <button onclick="window.location.reload()" style="width: 48%;">Cancel</button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td><input autocomplete="off" maxlength="9" placeholder="NIM" type="text" name="nim" id="nim" size="10px"></td>
                <td><input autocomplete="off" maxlength="32" placeholder="Nama" type="text" name="nama" id="nama" size="30px"></td>
                <td><input autocomplete="off" maxlength="2" placeholder="Umur" type="text" name="umur" id="umur" size="5px"></td>
                <td><button onclick="sendData()" style="width: 100%;">Tambah</button></td>
            </tr>
        </tbody>
    </table>


    <script>
        function showEditForm(nim) {
            var editForm = document.getElementById("editForm" + nim);
            var btnEdit = document.getElementById("btnEdit" + nim);
            var baris = document.getElementById("nim" + nim).parentNode;

            baris.parentNode.replaceChild(editForm, baris);
            editForm.style.display = "table-row";
        }

        function sendData() {
            var nim = document.getElementById("nim").value;
            var nama = document.getElementById("nama").value;
            var umur = document.getElementById("umur").value;

            var xhttp = new XMLHttpRequest();

            xhttp.open("POST", "<?php echo base_url('mahasiswa/store') ?>", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("nim=" + nim + "&nama=" + nama + "&umur=" + umur);

            window.location.reload();
        }

        function updateData(nim) {
            var nama = document.getElementById("nama" + nim).value;
            var umur = document.getElementById("umur" + nim).value;

            var xhttp = new XMLHttpRequest();

            xhttp.open("POST", "<?php echo base_url('mahasiswa/update/') ?>" + "/" + nim, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("&nama=" + nama + "&umur=" + umur);
            window.location.reload();
        }
    </script>
</body>

<?php echo $this->endSection(); ?>
