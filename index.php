<?php
    session_start();
    $server_name = "localhost";
    $server_user = 'root';
    $server_pass = '';
    $db_name = 'sim';

    $conn = mysqli_connect($server_name,$server_user,$server_pass,$db_name);
    
    if (!$conn) {
        echo "Koneksi ke Database Gagal";
        exit();
    }

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/style/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="icon" href="assets/images/logo.png">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@500&display=swap" rel="stylesheet">
        <title>
            <?php 
                @$p = $_GET['page'];
                if(!empty($p)){ 
                    if($p == 'home') {
                        echo "Sistem Informasi";
                    } else if($p == 'sistem-informasi') {
                        echo  "Artikel Sistem Informasi";
                    } else if($p == 'sim') {
                        echo "Artikel Sistem Informasi Manajemen";
                    } else if($p == 'si-pemasaran') {
                        echo "Sistem Informasi Pemasaran";
                    } else if($p == 'si-manufaktur') {
                        echo "Sistem Informasi Manufaktur";
                    } else if($p == 'si-sdm') {
                        echo "Sistem Informasi Sumber Daya Manusia";
                    } else if($p == 'si-keuangan') {
                        echo "Sistem Informasi Keuangan";
                    } else if($p == 'si-akuntansi') {
                        echo "Sistem Informasi Akuntansi";
                    } else if($p == 'simulasi-pemasaran') {
                        echo "Simulasi Sistem Informasi Pemasaran";
                    } else if($p == 'simulasi-sdm') {
                        echo "Simulasi Sistem Informasi SDM";
                    } else if($p == 'simulasi-akuntansi') {
                        echo "Simulasi Sistem Informasi Akuntansi";
                    } else if($p == 'simulasi-manufaktur') {
                        echo "Simulasi Sistem Informasi Manufaktur";
                    } else if($p == 'simulasi-keuangan') {
                        echo "Simulasi Sistem Informasi Keuangan";
                    } else if($p == 'admin') {
                        echo "Login Admin";
                    }

                }else {
                    echo "Sistem Informasi";
                }
            ?>
        </title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="?page=home" style="font-size:18px;">
                    <img class="logo" src="assets/images/logo.png">
                    Manajemen Informatika
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-auto">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                        
                            <li class="nav-item">
                                <a class="nav-link <?php if($p=='home'){echo 'active';}?>" href="?page=home">Beranda</a>
                            </li>

                            <div class="btn-group">
                                <button type="button" class="nav-link btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                    Materi Sistem Informasi
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a class="dropdown-item <?php if($p=='sistem-informasi'){echo 'active';}?>" href="?page=sistem-informasi">Sistem Informasi</a></li>
                                    <li><a class="dropdown-item <?php if($p=='sim'){echo 'active';}?>" href="?page=sim">Sistem Informasi Manajemen</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="nav-link btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                    SI Pendukung Bisnis
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a class="dropdown-item <?php if($p=='si-pemasaran'){echo 'active';}?>" href="?page=si-pemasaran">Sistem Informasi Pemasaran</a></li>
                                    <li><a class="dropdown-item <?php if($p=='si-manufaktur'){echo 'active';}?>" href="?page=si-manufaktur">Sistem Informasi Manufaktur</a></li>
                                    <li><a class="dropdown-item <?php if($p=='si-sdm'){echo 'active';}?>" href="?page=si-sdm">Sistem Informasi Sumber Daya Manusia</a></li>
                                    <li><a class="dropdown-item <?php if($p=='si-keuangan'){echo 'active';}?>" href="?page=si-keuangan">Sistem Informasi Keuangan</a></li>
                                    <li><a class="dropdown-item <?php if($p=='si-akuntansi'){echo 'active';}?>" href="?page=si-akuntansi">Sistem Informasi Akuntansi</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="nav-link btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                    Simulasi
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a class="dropdown-item <?php if($p=='simulasi-pemasaran'){echo 'active';}?>" href="?page=simulasi-pemasaran">Simulasi Sistem Informasi Pemasaran</a></li>
                                    <li><a class="dropdown-item <?php if($p=='simulasi-manufaktur'){echo 'active';}?>" href="?page=simulasi-manufaktur">Simulasi Sistem Informasi Manufaktur</a></li>
                                    <li><a class="dropdown-item <?php if($p=='simulasi-sdm'){echo 'active';}?>" href="?page=simulasi-sdm">Simulasi Sistem Informasi Sumber Daya Manusia</a></li>
                                    <li><a class="dropdown-item <?php if($p=='simulasi-keuangan'){echo 'active';}?>" href="?page=simulasi-keuangan">Simulasi Sistem Informasi Keuangan</a></li>
                                    
                                    <li><a class="dropdown-item <?php if($p=='simulasi-akuntansi'){echo 'active';}?>" href="?page=simulasi-akuntansi">Simulasi Sistem Informasi Akuntansi</a></li>                                    
                                </ul>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link <?php if($p=='admin'){echo 'active';}?>" href="?page=admin">Admin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        
            @$page = $_GET['page'];

            if(!empty($page)){
                
                switch ($page) {
                    case 'home' : 
                        include "page/home.php";
                        break;
                    
                    case 'sistem-informasi':
                        include "page/sistem-informasi.php";
                        break; 

                    case 'sim':
                        include "page/sim.php";
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

                    case 'simulasi-pemasaran' : 
                        include "page-simulasi/simulasi-pemasaran.php";
                        break;
                    
                    case 'simulasi-sdm' :
                        include "page-simulasi/simulasi-sdm.php";
                        break;

                    case 'simulasi-akuntansi' :
                        include "page-simulasi/simulasi-akuntansi.php";
                        break;
                        
                    case 'simulasi-manufaktur' :
                        include "page-simulasi/simulasi-manufaktur.php";
                        break;

                    case 'simulasi-keuangan' :
                        include "page-simulasi/simulasi-keuangan.php";
                        break;

                    case 'admin';
                        include "page/login.php";
                        break;

                    default:
                        include "page/home.php";
                        break;
                }

            }else {
                include "page/home.php";
            }

        ?>

<footer class="bg-dark text-white pt-5 pb-4">
    
    <div class="container text-center text-md-left">
    
        <div class="row text-center tect-md-left">
            
            <div class="col-md-2 col-lg-2 col-lg-4 mx-auto mt-3" style="padding-left:1px;margin:1px;">

                <img src="../TA/admin/assets/gambar/LOGO-SV-IPB-INDONESIA-English-college.png" width="300">

            </div>

            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-white" style="font-size:15px;">Tautan</h5>
                <p>
                    <a href="http://ipb.ac.id/" class="text-secondary" style="text-decoration:none;font-size:14px;">Website IPB University</a>
                </p>
                <p>
                    <a href="http://simak.ipb.ac.id/" class="text-secondary" style="text-decoration:none;font-size:14px;">SIMAK IPB</a>
                </p>
                <p>
                    <a href="http://evieta.ipb.ac.id/" class="text-secondary" style="text-decoration:none;font-size:14px;">IPB Online Course</a>
                </p>
                <p>
                    <a href="http://ereport.ipb.ac.id/" class="text-secondary" style="text-decoration:none;font-size:14px;">IPB University Repository</a>
                </p>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-white" style="font-size:15px;">ALAMAT & KONTAK</h5>
                <p style="font-size:14px;color:#777;">
                    Jl. Kumbang No. 14, Cilibende - Bogor Tengah
                </p>
                <p style="font-size:14px;color:#777;">
                    <i class="fas fa-phone mr-3"></i>
                    (0251) 8376845
                </p>
                <p style="font-size:14px;" class="text-secondary">
                    <i class="fas fa-envelope mr-3"></i>
                    <a href="mailto:%73v@a%70%70s.%69pb.a%63.id" class="text-secondary" style="text-decoration:none;">sv@apps.ipb.ac.id</a>
                </p>
            </div>

        </div>

        <hr class="mb-4">

        <div class="row align-items-start">
            <div class="col-md-7 col-lg-7 text-secondary">
            
                <p>Copyright © 2021 Sekolah Vokasi IPB.</p>

            </div>

            <div class="col-md-7 col-lg-4">
            
                <div class="text-md-right">

                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="http://facebook.com/vokasiipb" class="btn-floating btn-sm text-white" style="font-size:23px;">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="http://instagram.com/sekolahvokasiipb" class="btn-floating btn-sm text-white" style="font-size:23px;">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="http://twitter.com/vokasiipb" class="btn-floating btn-sm text-white" style="font-size:23px;">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                
                </div>

            </div>
        </div>

    </div>

</footer>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
        <script src="assets/style/script.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
            
            AOS.init();

            $(document).ready(function() {
                $("#btnExport").click(function(e) {
                    e.preventDefault();

                    //getting data from our table
                    var data_type = 'data:application/vnd.ms-excel';
                    var table_div = document.getElementById('table_wrapper');
                    var table_html = table_div.outerHTML.replace(/ /g, '%20');

                    var a = document.createElement('a');
                    a.href = data_type + ', ' + table_html;
                    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
                    a.click();
                });

                $("#btnExport2").click(function(e) {
                    e.preventDefault();

                    //getting data from our table
                    var data_type = 'data:application/vnd.ms-excel';
                    var table_div = document.getElementById('table_wrapper2');
                    var table_html = table_div.outerHTML.replace(/ /g, '%20');

                    var a = document.createElement('a');
                    a.href = data_type + ', ' + table_html;
                    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
                    a.click();
                });

                $("#btnExport3").click(function(e) {
                    e.preventDefault();

                    //getting data from our table
                    var data_type = 'data:application/vnd.ms-excel';
                    var table_div = document.getElementById('table_wrapper3');
                    var table_html = table_div.outerHTML.replace(/ /g, '%20');

                    var a = document.createElement('a');
                    a.href = data_type + ', ' + table_html;
                    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
                    a.click();
                });
            });

        function exportHTML(){
            var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                "xmlns='http://www.w3.org/TR/REC-html40'>"+
                "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
            var footer = "</body></html>";
            var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;
                    
            var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            var fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = 'document.doc';
            fileDownload.click();
            document.body.removeChild(fileDownload);
        }

                    
        function exportHTML2(){
            var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                "xmlns='http://www.w3.org/TR/REC-html40'>"+
                "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
            var footer = "</body></html>";
            var sourceHTML = header+document.getElementById("source-html2").innerHTML+footer;
                
            var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            var fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = 'document.doc';
            fileDownload.click();
            document.body.removeChild(fileDownload);
        }

        function exportHTML3(){
            var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                "xmlns='http://www.w3.org/TR/REC-html40'>"+
                "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
            var footer = "</body></html>";
            var sourceHTML = header+document.getElementById("source-html3").innerHTML+footer;
                    
            var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            var fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = 'document.doc';
            fileDownload.click();
            document.body.removeChild(fileDownload);
        }


        function checkval(){1==$("tbody tr:visible").length&&"No result found"==$("tbody tr:visible td").html()?$("#rowcount").html("0"):$("#rowcount").html($("tr:visible").length-1)}$(document).ready(function(){$("#rowcount").html($(".filterable tr").length-1),$(".filterable .btn-filter").click(function(){var t=$(this).parents(".filterable"),e=t.find(".filters input"),l=t.find(".table tbody");1==e.prop("disabled")?(e.prop("disabled",!1),e.first().focus()):(e.val("").prop("disabled",!0),l.find(".no-result").remove(),l.find("tr").show()),$("#rowcount").html($(".filterable tr").length-1)}),$(".filterable .filters input").keyup(function(t){if("9"!=(t.keyCode||t.which)){var e=$(this),l=e.val().toLowerCase(),n=e.parents(".filterable"),i=n.find(".filters th").index(e.parents("th")),r=n.find(".table"),o=r.find("tbody tr"),d=o.filter(function(){return-1===$(this).find("td").eq(i).text().toLowerCase().indexOf(l)});r.find("tbody .no-result").remove(),o.show(),d.hide(),d.length===o.length&&r.find("tbody").prepend($('<tr class="no-result text-center"><td colspan="'+r.find(".filters th").length+'">No result found</td></tr>'))}$("#rowcount").html($("tr:visible").length-1),checkval()})});

        </script>
    </boody>
</html>