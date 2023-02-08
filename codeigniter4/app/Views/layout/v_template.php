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
            <td colspan="3" align="center" bgcolor="lightblue">
                <h1>Bandung State Polytechnic</h1>
            </td>
        </tr>

        <!-- Navbar -->
        <tr>
            <td bgcolor="lightyellow">
                <a href="<?php echo base_url('home') ?>">Home</a>
                <a href=" <?php echo base_url('info') ?>">Info</a>
                <a href=" <?php echo base_url('mahasiswa') ?>">Mahasiswa</a>
            </td>
        </tr>

        <!-- Main Content Template -->
        <tr>
            <td align="center" height="420px">
                <?php echo $this->renderSection('content') ?>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td colspan="3" align="center" bgcolor="lightblue">
                &copy; 2021 - Bandung State Polytechnic
            </td>
        </tr>
    </table>


</body>

</html>
