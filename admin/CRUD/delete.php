<?php
    include 'connection.php';
    
    if (isset($_POST['deletedata'])) {

        $page = $_POST['page'];
        $id = $_POST['delete_id'];

        $query = "DELETE FROM artikel_bacaan WHERE id = '$id'";
        $query_run = mysqli_query($conn,$query);

        if($query_run){
            echo '<script> alert ("Data Berhasil Dihapus");</script>';
            header("location: $page");
        }
        else {
            echo $id, '<script> alert ("Data Tidak Berhasil Dihapus ");</script>';
        }
    }
?>