<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $db = "akademik";

    $conn = mysqli_connect($server, $username, $password, $db);

    if ($conn) {
        //get the id from the form
        $id = $_POST['nim'];

        //construct the delete query
        $sql = "DELETE FROM mahasiswa WHERE nim='$id'";

        //execute the query
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);

        header("Location: index.php");
    }
?>
