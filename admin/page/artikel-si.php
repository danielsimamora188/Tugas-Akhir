<?php 

include 'CRUD/connection.php';

?>


<button type="button" class="tombol" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Artikel
</button>

<!-- FORM TAMBAH DATA -->
<form action="CRUD/create.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="mb-3">
                        <!-- Value Untuk Dashboard -->
                        <input type="hidden" name="id" value=1>
                        <input type="hidden" name="page" value='../index.php?page=artikel-si'>

                        <label for="text" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" name="judul" id="judul" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Artikel</label>
                        <input class="form-control" type="file" id="formFile" name="file">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Isi Artikel</label>
                        <textarea class="ckeditor" name="editor" id="editor" required></textarea>
                    </div>
                </div>

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            
            </div>
        </div>
    </div>
</form>


<!-- FORM HAPUS DATA -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="CRUD/delete.php" method="POST">
                <div class="modal-body">
                        
                    <input type="hidden" name="delete_id" id="deleted_id">
                    <input type="hidden" name="page" value='../index.php?page=artikel-si'>

                    <h4>Konfirmasi</h4>
                    <p style="padding-top:14px;">Apakah anda yakin menghapus data ini ?</p>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    
                    <button type="submit" name="deletedata" class="btn btn-success">Ya</button>
                </div>
            </form>
            </div>
        </div>
    </div>




<!-- FORM EDIT DATA -->
<form action="" id="form" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel";>Edit Artikel</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body" id="modal-edit">
                    <div class="mb-3">
                        <label for="text" class="form-label">Judul Artikel</label>
                        <input type="number" min="0" max="100000000" class="form-control" name="judul" id="judul" value="<?php $tampil['id'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Artikel</label>
                        <div style="padding-bottom: 10px;">
                            <img src="" style="width: 200px;" id="pict">
                        </div>
                        <input class="form-control" type="file" id="formFile" name="file">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Artikel</label>
                        <textarea class="ckeditor" name="editor" id="editisi"></textarea>
                    </div>
                </div>

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                </div>
            
            </div>
        </div>
    </div>
</form>






<h2 style="margin-bottom: 20px; text-align:center;"><b>Artikel Sistem Informasi</b></h2>
 
<table class="table table-bordered border-primary">
    
    <tr class="table-primary" style="text-align: center;">
        <th scope="col">No.</th>
        <th scope="col">Judul Artikel</th>
        <th scope="col">Gambar Artikel</th>
        <th scope="col">Isi Artikel</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
<?php 
    $no = 1;
    $query = "SELECT * FROM artikel_bacaan WHERE id_judul = 1";
    $result = mysqli_query($conn,$query);
    $page = "index.php";
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){ 
        
            echo "<tr>";
            
            echo "<td style='text-align: center;'>".$no."</td>";
            echo "<td style='text-align: center;'>".$row['judul']."</td>";
            echo "<td style='text-align: center;'>".'<img src="../admin/CRUD/gambar/'.$row['gambar'].'" style="width: 60px;"></td>'."</td>";
            echo "<td>".$row['isi']."</td>";

            echo "<td style='text-align: center;'>".'<a type="button" href="CRUD/update.php?id='.$row['id'].'" class="btn btn-primary">Edit</a></td>';

            echo "<td style='text-align: center;'> ".'<button type="button" data-id="'.$row['id'].'" class="btn btn-danger deletebtn">Hapus</button></td>';

            echo "</tr>";

            $no++;
        }
    }

?>



