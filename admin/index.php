<?php 

  session_start();

  include("CRUD/connection.php");
  
  if (!isset($_SESSION['login'])) {
    header("location: /TA/index.php?page=admin");
    exit;
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
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
      <div class="sidebar-brand">
        <h2><span class="lab la-accusoft"></span><span>SIM Dashboard</span></h2>
      </div>
       
      <?php @$p = $_GET['page']; ?>
      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="?page=home" class="<?php if($p=='home'){echo 'active';}?>"><span class="las la-igloo"></span>
              <span>Dashboard</span></a>
          </li>
          <h2 style="padding-top: 30px;">Artikel 1</h2>
          <li>
            <a href="?page=artikel-si" class="<?php if($p=='artikel-si'){echo 'active';}?>"><span class="las la-clipboard-list"></span>
              <span>Sistem Informasi</span></a>
          </li>
          <li>
            <a href="?page=artikel-sim" class="<?php if($p=='artikel-sim'){echo 'active';}?>"><span class="las la-clipboard-list"></span>
              <span>Sistem Informasi Manajemen</span></a>
          </li>
          <h2 style="padding-top: 30px;">Artikel 2</h2>
          <li>
            <a href="?page=si-pemasaran" class="<?php if($p=='si-pemasaran'){echo 'active';}?>"><span class="las la-clipboard-list"></span>
              <span>Sistem Informasi Pemasaran</span></a>
          </li>
          <li>
            <a href="?page=si-manufaktur" class="<?php if($p=='si-manufaktur'){echo 'active';}?>"><span class="las la-clipboard-list"></span>
              <span>Sistem Informasi Manufaktur</span></a>
          </li>
          <li>
            <a href="?page=si-sdm" class="<?php if($p=='si-sdm'){echo 'active';}?>"><span class="las la-clipboard-list"></span>
              <span>Sistem Informasi SDM</span></a>
          </li>
          <li>
            <a href="?page=si-keuangan" class="<?php if($p=='si-keuangan'){echo 'active';}?>"><span class="las la-clipboard-list"></span>
              <span>Sistem Informasi Keuangan</span></a>
          </li>
          <li>
            <a href="?page=si-akuntansi" class="<?php if($p=='si-akuntansi'){echo 'active';}?>"><span class="las la-clipboard-list"></span>
              <span>Sistem Informasi Akuntansi</span></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-content">
      <header>
        <h1>
          <label for="nav-toggle">
            <span class="las la-bars"></span>
          </label>
        </h1>


        <div class="user-wrapper">
          <img src="assets/gambar/logo.png" width="30px" height="30px" alt="">
          <div>
            <h4><?php echo $_SESSION['username']; ?></h4>
            <a href="page/logout.php"><small>keluar</small></a>
          </div>
        </div>
      </header>

      <main>
        
        <?php
        
            @$page = $_GET['page'];

            if(!empty($page)){
                
                switch ($page) {
                    case 'home' : 
                        include "page/home.php";
                        break;
                    
                    case 'artikel-si':
                        include "page/artikel-si.php";
                        break; 

                    case 'artikel-sim':
                        include "page/artikel-sim.php";
                        break;
                        
                    case 'si-pemasaran':
                        include "page/si-pemasaran.php";
                        break;
                        
                    case 'si-manufaktur':
                        include "page/si-manufaktur.php";
                        break;  

                    case 'si-sdm':
                        include "page/si-sdm.php";
                        break;          

                    case 'si-keuangan':
                        include "page/si-keuangan.php";
                        break;
                        
                    case 'si-akuntansi':
                        include "page/si-akuntansi.php";
                        break;
                    
                    case 'update':
                        include "CRUD/update.php";
                        break;

                    default:
                        include "page/home.php";
                        break;
                }

            }else {
                include "page/home.php";
            }

        ?>

      </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../admin/ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        
        $('.deletebtn').on('click', function(){
          $('#deletemodal').modal('show');
            
            var idartikel = $(this).data('id');
            $("#deletemodal #deleted_id").val(idartikel);

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
        });
      

      });
    </script>

</body>
</html>