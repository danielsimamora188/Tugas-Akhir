<?php
    include 'connection.php';

    if (isset($_POST['submit'])) {
        
        $page = $_POST['page'];
        $id_judul = $_POST['id'];
        $judul = $_POST['judul'];

        $extensi = $_FILES['file']['name'];
        $sumber = $_FILES['file']['tmp_name'];
        $folder = 'gambar/';
        $content = $_POST['editor'];

        move_uploaded_file($sumber,$folder.$extensi);
        $sql = "INSERT INTO artikel_bacaan (id_judul, judul, gambar, isi) values ('$id_judul','$judul','$extensi','$content')";

        if(mysqli_query($conn,$sql)){
            header("location: $page");
        } else {
            echo "Upload Gagal";
        }
    }
?>