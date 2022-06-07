<h1 class="judul text-center" style="margin:40px 0 40px 0;">Simulasi Sistem Informasi Keuangan</h1>


<?php
    ini_set("display_errors",0);
    include("function.php");

    $namaperusahaan = @$_POST['nama'];
    $produk = @$_POST['produk'];
    $tanggal = @$_POST['tanggal'];
    
    $modal1 = @$_POST['modal-awal'];
    $modal = str_replace(".", "", $modal1);
    
    $harga_jual1 = @$_POST['harga-jual'];
    $harga_jual = str_replace(".", "", $harga_jual1);

    $jumlah_terjual = @$_POST['jumlah-terjual'];

    $beban_gaji1 = @$_POST['beban-gaji'];
    $beban_gaji = str_replace(".", "", $beban_gaji1);

    $beban_sewa1 = @$_POST['beban-sewa'];
    $beban_sewa = str_replace(".", "", $beban_sewa1);

    $beban_perlengkapan1 = @$_POST['beban-perlengkapan'];
    $beban_perlengkapan = str_replace(".", "", $beban_perlengkapan1);
    
    $beban_listrik1 = @$_POST['beban-listrik'];
    $beban_listrik = str_replace(".", "", $beban_listrik1);

    $beban_lainnya1 = @$_POST['beban-lainnya'];
    $beban_lainnya = str_replace(".", "", $beban_lainnya1);
    
    $prive1 = @$_POST['prive']; 
    $prive = str_replace(".", "", $prive1);

  if (isset($_POST['savedata'])) {

    $pendapatan = $harga_jual*$jumlah_terjual;
    $beban = $beban_gaji+$beban_sewa+$beban_perlengkapan+$beban_listrik+$beban_lainnya;
    $laba = $pendapatan-$beban;
    $kenaikan = $modal + $laba;
    $modal_akhir = $kenaikan-$prive;
  }

?>

<!--FORM LABA RUGI -->
<div class="container">
    <div class="modal fade" id="subproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            
            <form action="#source-html" method="POST">
            
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Isi data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-bordered border-primary">
                                <h4>Data Perusahaan</h4>
                                <tr>
                                    <td scope="row">Nama Perusahaan</td>
                                    <td width="595px"><input type="text" maxlength="40" class="form-control" name="nama" required></td>
                                </tr>
                                <tr>
                                <td scope="row">Nama produk</td>
                                    <td><input type="text" maxlength="40" class="form-control" name="produk" required></td>
                                </tr>
                                <tr>
                                    <td scope="row">Data pada bulan</td>
                                    <td><input type="month" class="form-control" name="tanggal" required></td>
                                </tr>

                                    <td scope="row">Modal Awal Perusahaan</td>
                                    <th>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="modal-awal" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"  required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </th>
                                </tr>
                        </table>
                        
                        <h4 style="padding-top:10px;">Pendapatan</h4>
                        
                        <table class="table table-bordered border-primary">
                            <tr>
                                <td scope="row">Harga jual per-unit</td>
                                
                                <th width="595px">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" aria-label="Rupiah" name="harga-jual" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td scope="row">Jumlah produk yang terjual</td>
            
                                <th>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" aria-label="Rupiah" name="jumlah-terjual" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </th>
                            </tr>
                            
                        </table>

                        
                        <h4 style="padding-top:10px;">Beban</h4>
                        <table class="table table-bordered border-primary">
                            <tr>
                                <td scope="row">Beban gaji</td>
                                
                                <th width="595px">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" aria-label="Rupiah" name="beban-gaji" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td scope="row">Beban sewa</td>
                                
                                <th>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" aria-label="Rupiah" name="beban-sewa" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td scope="row">Beban perlengkapan</td>
                                
                                <th>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" aria-label="unit" name="beban-perlengkapan" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td scope="row">Beban listrik</td>
                                
                                <th>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" name="beban-listrik" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td scope="row">Beban lainnya</td>
                                
                                <th>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" name="beban-lainnya" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td scope="row">Pengeluaran(Prive)</td>
                                
                                <th>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" name="prive" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </th>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" name="savedata" class="btn btn-primary">Simpan</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<!--DATA LABA RUGI-->
<div class="container">
    <h4 class="judul" style="padding: 0; margin:30px 0 0 0;">Laporan Keuangan</h4>
    <p class="isi-artikel" style="margin-bottom:0;padding-bottom:0;">Laporan keuangan adalah laporan yang berisi pencatatan uang dan transaksi yang terjadi dalam bisnis, baik transaksi pembelian maupun penjualan dan transaksi lainnya yang memiliki nilai ekonomi dan moneter. Menurut <b>(Suteja, 2018)</b> “<b>laporan keuangan</b> adalah suatu laporan yang menggambarkan posisi keuangan dari hasil suatu proses akuntansi selama periode tertentu yang digunakan sebagai alat komunikasi bagi pihak-pihak yang berkepentingan”. Laporan keuangan dibuat untuk mengetahui kondisi finansial perusahaan secara keseluruhan. Sehingga para stakeholder  dan pengguna informasi akuntansi bisa melakukan evaluasi dan cara pencegahan dengan tepat dan cepat jika kondisi keuangan usaha mengalami masalah atau memerlukan perubahan.</p>
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subproduk" style="margin: 10px 0 50px 0;">
      Isi data
    </button>
    
    <h5>1. Laporan Laba & Rugi</h5>
    <p class="isi-artikel">Laporan laba rugi adalah laporan finansial perusahaan yang dibuat oleh bidang keuangan tertentu. Isi dari laporan ini ialah data-data pendapatan sekaligus beban yang ditanggung oleh perusahaan.</p>
    

    <div id="source-html">
        <table class="table table-striped" id='table_wrapper'>
        <thead class="table-primary">
            <tr>
                <th colspan="5">
                    <h4 class="text-center" style="font-size: 20px; margin:0;padding:0;">Laporan Laba & Rugi</h4>
                    <h4 class="isi text-center" style="font-size: 20px;">PT <?php if (isset($namaperusahaan)) {echo $namaperusahaan; } else {echo "Nama Perusahaan"; } ?></h4>
                    <h4 class="isi text-center" style="font-size: 15px;"><?php if (isset($tanggal)) {echo $waktu = format_tanggal($tanggal); } else {echo "Tanggal"; } ?></h4>
                </th>
            </tr>
            <tr>
                <th colspan="5" style="font-size:18px;">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding-left:50px">Pendapatan Jasa</th>
                <th></th>
                <td colspan="4" class="text-center"><?php if (isset($pendapatan)) {echo rupiah($pendapatan); } else {echo "0"; } ?></td>
            </tr>
            <tr>
                <th style="font-size:18px;">Beban</th>
            <tr>
                <td style="padding-left:50px;">Beban Gaji</td>
                <td colspan="3" class="text-center"><?php if (isset($beban_gaji)) {echo rupiah($beban_gaji); } else {echo "0"; } ?></td>
            </tr>
            <tr>
                <td style="padding-left:50px">Beban Sewa</td>
                <td colspan="3" class="text-center"><?php if (isset($beban_sewa)) {echo rupiah($beban_sewa); } else {echo "0"; } ?></td>
            </tr>
            <tr>
                <td style="padding-left:50px">Beban Perlengkapan</td>
                <td colspan="3" class="text-center"><?php if (isset($beban_perlengkapan)) {echo rupiah($beban_perlengkapan); } else {echo "0"; } ?></td>
            </tr>
            <tr>
                <td style="padding-left:50px">Beban Listrik</td>
                <td colspan="3" class="text-center"><?php if (isset($beban_listrik)) {echo rupiah($beban_listrik); } else {echo "0"; } ?></td>
            </tr>
            <tr>
                <td style="padding-left:50px">Beban Lainnya</td>
                <td colspan="3" class="text-center"><?php if (isset($beban_lainnya)) {echo rupiah($beban_lainnya); } else {echo "0"; } ?></td>
            </tr>
            <tr>
                <th></th>
                <td></td>
                <td colspan="4" class="text-center"><?php if (isset($beban)) {echo $akhir=rupiah($beban);} else {echo "0";} ?></td>
            </tr>
            <tr>
                <th>Laba</th>
                <td></td>
                <th colspan="4" class="text-center"><?php if (isset($akhir)) {echo $akhir=rupiah(abs($laba));} else {echo "0";} ?></th>
            </tr>
        </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                <td class="text-start" colspan="2">
                    <?php 
                        if(isset($laba)){
                            if($laba < 0){
                                echo "Perusahaan $namaperusahaan pada bulan $waktu mengalami kerugian sebesar <b>$akhir</b>";
                                } else {
                                echo "Perusahaan $namaperusahaan pada bulan $waktu mengalami keuntungan sebesar <b>$akhir</b>";
                            }
                        }
                    ?>
                </td>
            <div class="col">
                <p align="right">
                    <button id="btnExport" class="btn btn-success">Export to Excel</button>
                    <button id="btn-export" onclick="exportHTML();" class="btn btn-primary">Export to Word</button>
                </p>
            </div>
        </div>
    </div>
</div>

    <h5>2. Laporan Perubahan Modal</h5>
    <p class="isi-artikel">Laporan perubahan modal atau ekuitas adalah salah satu jenis laporan keuangan yang bertujuan agar perusahaan dapat menggambarkan peningkatan maupun penurunan dari aktiva bersih (kekayaan) dalam periode tertentu dengan prinsip pengukuran tertentu untuk dianut.</p>

    <div id="source-html2">
        <table class="table table-striped" id='table_wrapper2'>
            <thead class="table-primary">
                <tr>
                    <th colspan="3">
                        <h4 class="text-center" style="font-size: 20px; margin:0;padding:0;">Laporan Perubahan Modal</h4>
                        <h4 class="isi text-center" style="font-size: 20px;">PT <?php if (isset($namaperusahaan)) {echo $namaperusahaan; } else {echo "Nama Perusahaan"; } ?></h4>
                        <h4 class="isi text-center" style="font-size: 15px;"><?php if (isset($tanggal)) {echo $waktu = format_tanggal($tanggal); } else {echo "Tanggal"; } ?></h4>
                    </th>
                </tr>
            </thead>
            </tbody>
                <tr>
                    <td>Modal Awal</th>
                    <td class="text-end"><?php if (isset($modal)) {echo rupiah($modal); } else {echo "0"; } ?></th>
                    <td></td>
                </tr>
                <tr>
                    <td>Laba</th>
                    <td class="text-end"><?php if (isset($laba)) {echo rupiah(abs($laba));; } else {echo "0"; } ?></th>
                    <td></td>
                </tr>
                <tr>
                    <th style="padding-left:200px;">
                        <?php 
                            if(isset($laba)){
                                if($laba < 0){
                                    echo "Penurunan Modal";
                                    } else {
                                    echo "Kenaikan Modal";
                                }
                            }
                        ?>
                    </td>
                    <th class="text-end"><?php if (isset($kenaikan)) {echo rupiah($kenaikan); } else {echo "0"; } ?></th>
                    <td></td>
                </tr>
                <tr>
                    <td>Prive</th>
                    <td class="text-end"><?php if (isset($prive)) {echo rupiah($prive); } else {echo "0"; } ?></th>
                    <td></td>
                </tr>
                <tr>
                    <th style="padding-left:200px;">Modal Akhir</td>
                    <th class="text-end"><?php if (isset($modal_akhir)) {echo rupiah($modal_akhir); } else {echo "0"; } ?></th>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
        <p align="right">
            <button id="btnExport2" class="btn btn-success">Export to Excel</button>
            <button id="btn-export" onclick="exportHTML2();" class="btn btn-primary">Export to Word</button>
        </p>
    </div>
</div>