<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
</head>

<body>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <!-- Header -->
        <tr>
            <td colspan="5" align="center" bgcolor="lightblue">
                <h1>Bandung State Polytechnic</h1>
            </td>
        </tr>

        <!-- Navbar -->
        <tr>
            <td bgcolor="lightyellow" width="50px" align="center">
                <a href="<?php echo base_url('mahasiswa/home') ?>">Home</a>
            </td>
            <td bgcolor="lightyellow" width="50px" align="center">
                <a href="<?php echo base_url('mahasiswa/info') ?>">Info</a>
            </td>
            <td bgcolor="lightyellow" width="50px" align="center">
                <a href="<?php echo base_url('mahasiswa') ?>">Mahasiswa</a>
            </td>
            <td width="1000">
                Selamat Datang, <?php echo session()->get('username'); ?>
            </td>
            <td bgcolor="lightyellow" align="center" width="50px">
                <a href="<?php echo base_url('mahasiswa/logout') ?>">Logout</a>
            </td>
        </tr>

        <!-- Main Content Template -->
        <tr>
            <td align="center" height="420px" colspan="5">
                <?php echo $this->renderSection('content') ?>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td colspan="5" align="center" bgcolor="lightblue">
                &copy; 2021 - Bandung State Polytechnic
            </td>
        </tr>
    </table>


</body>

</html>
