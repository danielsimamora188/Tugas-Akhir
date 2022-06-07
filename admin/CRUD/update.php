<?php 

    include "connection.php";

    if ($_GET['id']) {

        $id = $_GET['id'];

        $query = "SELECT * FROM artikel_bacaan WHERE id='$id'";
        
        $results = mysqli_query($conn,$query);
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)){
                $id = $row['id'];
                $judul = $row['judul'];
                $isi = $row['isi'];
                $gambar = $row['gambar'];
            }
        }
    } else {
        header("location: $page");
    }

    if (isset($_POST['submit'])) {
        
        $id_judul = $_POST['id'];
        $judul = $_POST['judul'];
        
        $extensi = $_FILES['file']['name'];
        $sumber = $_FILES['file']['tmp_name'];
        $folder = 'gambar/';

        $content = $_POST['editor'];

        if ($extensi == '') {
            $sql = "UPDATE artikel_bacaan SET judul = '$judul', isi = '$content' WHERE id = $id_judul";
            mysqli_query($conn,$sql);
            header('location: ../');
        } else {
            move_uploaded_file($sumber,$folder.$extensi);
            $sql= "UPDATE artikel_bacaan SET judul = '$judul',gambar = '$extensi' , isi = '$content' WHERE id = $id_judul";
            mysqli_query($conn,$sql);
            header('location: ../');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="assets/style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container" style="padding:50px 100px;">
        <div class="mb-3">
            <!-- Value Untuk Dashboard -->
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>" required>

            <label for="text" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Artikel</label><br>
            <img src="gambar/<?php echo $gambar ?>" alt="" style="width: 200px;padding-bottom:10px;">
            <input class="form-control" type="file" id="formFile" name="file" value="">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Isi Artikel</label>
            <textarea class="ckeditor" name="editor" id="editor"><?php echo $isi ?></textarea>
        </div>

        
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
</body>
</html>