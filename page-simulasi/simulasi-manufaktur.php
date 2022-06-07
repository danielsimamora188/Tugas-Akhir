<h1 class="judul text-center" style="margin:40px 0 40px 0;">Simulasi Sistem Informasi Manufaktur</h1>

<?php

    ini_set('display_errors', 0);
    include("function.php");

    $bulan = array(-4 => "Agustus", -3 => "September", -2 => "Oktober", -1 => "November", 0 => "Desember", 1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember");


    $produk1 = @$_POST['nama-produk1'];
    $produk2 = @$_POST['nama-produk2'];
    $produk3 = @$_POST['nama-produk3'];
    $perusahaan = @$_POST['nama-perusahaan'];
    $perusahaan2 = @$_POST['nama-perusahaan2'];
    $nama =  @$_POST['nama-perusahaan'];
    $waktu1 = @$_POST['waktu1'];
    $waktu2 = @$_POST['waktu2'];
    $waktu3 = @$_POST['waktu3'];
    $forecast = @$_POST['forecast'];
    $stock = @$_POST['stock'];

    $bahanbakuawal1 = @$_POST['bahanbakuawal'];
    $bahanbakuawal = str_replace(".", "", $bahanbakuawal1);

    $pembelianbahanbaku1 = @$_POST['pembelianbahanbaku'];
    $pembelianbahanbaku = str_replace(".", "", $pembelianbahanbaku1);

    $bahanbakuakhir1 = @$_POST['bahanbakuakhir'];
    $bahanbakuakhir = str_replace(".", "", $bahanbakuakhir1);

    $gajikaryawan1 = @$_POST['gajikaryawan'];
    $gajikaryawan = str_replace(".", "", $gajikaryawan1);
    $jumlahkaryawan = @$_POST['jumlahkaryawan'];

    $gajitenagakerja1 = @$_POST['gajitenagakerja'];
    $gajitenagakerja = str_replace(".", "", $gajitenagakerja1);
    $jumlahtenagakerja = @$_POST['jumlahtenagakerja'];

    $pemeliharaan1 = @$_POST['pemeliharaan'];
    $pemeliharaan = str_replace(".", "", $pemeliharaan1);

    $perlengkapan1 = @$_POST['perlengkapan'];
    $perlengkapan = str_replace(".", "", $perlengkapan1);
    
    $barangakhir1 = @$_POST['barangakhir'];
    $barangakhir = str_replace(".", "", $barangakhir1);

    $barangawal1 = @$_POST['barangawal'];
    $barangawal = str_replace(".", "", $barangawal1);

    $pemakaianbahanbaku = $bahanbakuawal+$pembelianbahanbaku-$bahanbakuakhir;
    $upahlangsung = $gajikaryawan*$jumlahkaryawan;
    $upahtaklangsung = $gajitenagakerja*$jumlahtenagakerja;
    $barangproses = $pembelianbahanbaku+$upahtaklangsung+$upahlangsung+$pemeliharaan+$perlengkapan+$persediaanbarang;
    $hargapokokproduksi = $barangawal+$barangproses-$barangakhir;

    $rencana = $forecast-$stock;
    $minggu = '';
    $minggu1 = '';
    $no = 1;

    if (isset($_POST['rencana'])) {
        $minggu = ceil($rencana/4);
        $minggu1 = ceil($rencana/4);
        $no = 1;
        
        $bahanbaku = $saldobahanbaku-$pembelian;
        $gaji = $jumlahkaryawan * $gajikaryawan;
        $biayaporduksi = $bahanbaku + $gaji+$perlengkapan+$pemeliharaan;
    }

?>

<!--FORM MASTER JADWAL PRODUKSI-->
<div class="container" id="top">
    <h1 class="judul" style="margin:40px 0 10px 0;">1. Jadwal Induk Produksi</h1>
    <p class="isi-artikel">Master Production Schedule (MPS) atau jadwal induk produksi adalah suatu metode yang digunakan untuk membuat rencana produksi baik berupa bulanan ataupun mingguan. MPS berasal dari data forecasting (peralaman permintaan) jika produk itu bersifat make to stock, namun MPS juga berasal dari data demand (permintaan customer) jika produk itu bersifat make to order). Departemen yang bertanggung jawab dalam membuat MPS adalah PPIC, sebagai perencana produksi dan pengendali inventory.</p>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#jadwal-produksi" style="margin-bottom: 30px;">
        Isi data
    </button>

    <div class="modal fade" id="jadwal-produksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form action="#top" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Isi data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <table class="table table-bordered border-primary">
                        <tbody>
                            <tr>
                                <th>Nama Produk :</th>
                                <td><input type="text" maxlength="40" class="form-control" name="nama-produk1" required></td>
                            </tr>
                            <tr>
                                <th>Waktu permintaan :</th>
                                <td><select class="form-select" name="waktu1">
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select></td>
                            </tr>
                            <tr>
                                <th>Jumlah Permintaan (forecast) :</th>
                                <td><input type="number" min="0" max="100000000" class="form-control" name="forecast" required></td>
                            </tr>
                            <tr>
                                <th>Stock Produk :</th>
                                <td><input type="number" min="0" max="100000000" class="form-control" name="stock"></td>
                            </tr>
                        </tbody>
                    </table>                          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <a href="#source-html2"><button type="submit" name="rencana" class="btn btn-primary">Simpan</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!--DATA MASTER JADWAL PRODUKSI-->
<div class="container">

    <div id="source-html2">
        <table class="table table-primary" id='table_wrapper2'>
            <thead>
            <tr>
                <th scope="col" rowspan="2" class="text-center" style="padding-bottom: 3%;">Produksi</th>
                <th scope="col" rowspan="2" class="text-center" style="padding-bottom: 3%;">Rencana Produksi</th>
                <th scope="col" colspan="4" class="text-center"><?php echo $waktu1; ?></th>
            </tr>  
            <tr class="text-center">
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
            </tr>
            </thead>
            <tbody class="table table-striped">
                <tr class="text-center">
                    <th scope="row"><?php if (isset($produk1)) {echo $produk1;} else {echo "-";} ?></th>
                    <td class="text-center"><?php echo $forecast-$stock; ?></td>
                    <?php
                        while ($no <= 4) {
                            if ($minggu < $rencana) {
                                echo "<td>$minggu1</td>";
                                $minggu = ceil($minggu+$minggu1);
                            } else {
                                $hasil = $minggu1 + ($rencana-$minggu);
                                echo "<td>$hasil</td>";
                            }
                        $no++;
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    
    <p align="right">
      <button id="btnExport2" class="btn btn-success">Export to Excel</button>
      <button id="btn-export" onclick="exportHTML2();" class="btn btn-primary">Export to Word</button>
    </p>

</div>


<!-- FORM lAPORAN HARGA PRODUKSI -->
<div class="container">
    <h1 class="judul" style="margin:40px 0 10px 0;">2. Laporan Harga Pokok Produksi</h1>
    <p class="isi-artikel"><b>Menurut Bustami dan Nurlela (2010:49):</b> Laporan Harga Pokok Produksi adalah Kumpulan biaya produksi yang terdiri dari bahan baku langsung, tenaga kerja langsung, dan biaya overhead pabrik ditambah persediaan produk dalam proses awal dan dikurang persediaan produk dalam proses akhir. Harga pokok produksi terikat pada periode waktu tertentu. Harga pokok produksi akan sama dengan biaya produksi apabila tidak ada persediaan produk dalam proses awal dan akhir.</p>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#laporan-produksi" style="margin-bottom: 30px;">
        Isi data
    </button>

    <!-- MODAL -->
    <div class="modal fade" id="laporan-produksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <td>Nama Perusahaan</td>
                                    <td width="595px"><input type="text" maxlength="40" class="form-control" name="nama-perusahaan2" required></td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td width="595px"><input type="text" maxlength="40" class="form-control" name="nama-produk2" required></td>
                                </tr>
                                <tr>
                                    <td>Waktu permintaan</td>
                                    <td><select class="form-select" name="waktu2">
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select></td>
                                </tr>
                        </table>

                        <h4 style="padding-top:10px;">Bahan Baku</h4>
                        
                        <table class="table table-bordered border-primary">
                                <tr>
                                    <td>Persediaan bahan baku(awal)</td>
                                    <td width="595px">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="bahanbakuawal" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pembelian Bahan Baku</td>                                    
                                    <td>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="pembelianbahanbaku" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Persediaan Bahan Baku(akhir)</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="bahanbakuakhir"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>
                        </table>

                        <h4 style="padding-top:10px;">Gaji Karyawan</h4>
                        
                        <table class="table table-bordered border-primary">
                                <tr>
                                    <td>Gaji Karyawan Produksi</td>
                                    <td width="595px">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="gajikaryawan" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Karyawan Produksi</td>
                                    <td><input type="number" class="form-control" name="jumlahkaryawan" required></td></td>
                                </tr>
                        </table>

                        <h4 style="padding-top:10px;">Biaya Overhead Pabrik</h4>

                        <table class="table table-bordered border-primary">
                                <tr>
                                    <td>Gaji Pekerja tidak Langsung</td>
                                    <td width="595px">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="gajitenagakerja" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Tenaga Kerja Tidak Langsung</td>
                                    <td><input type="number" class="form-control" name="jumlahtenagakerja" required></td></td>
                                </tr>
                                <tr>
                                    <td>Biaya Pemeliharaan Mesin :</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="pemeliharaan" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>    
                                <tr>
                                    <td>Biaya Perlengkapan Pabrik :</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="perlengkapan" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>
                        </table>
                        
                        <h4 style="padding-top:10px;">Biaya Produksi</h4>

                        <table class="table table-bordered border-primary">
                                <tr>
                                    <td>Persediaan Barang jadi(awal)</td>
                                    <td width="595px">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="barangawal" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Persediaan Barang jadi(akhir)</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" aria-label="Rupiah" name="barangakhir" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </td>
                                </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <a href="#source-html"><button type="submit" name="rencana" class="btn btn-primary">Simpan</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DATA lAPORAN HARGA PRODUKSI -->
<div class="container">

    <div id="source-html">
        <table class="table table-primary" id='table_wrapper'>
            <thead class="text-center">
                <tr>
                    <th scope="col" colspan="4"><h4 class="text-center" style="font-size: 20px; margin:0;padding:0;">Laporan Harga Pokok Produksi <?php echo $produk2; ?></h4></th>
                </tr>
                <tr>
                    <th scope="col" colspan="4"><h4 class="text-center" style="font-size: 20px; margin:0;padding:0;">Perusahaan <?php echo $perusahaan2; ?></h4></th>
                </tr>
                <tr>
                    <th scope="col" colspan="4"><h4 class="text-center" style="font-size: 20px; margin:0;padding:0;">Bulan <?php echo $waktu2; ?></h4></th>
                </tr>
            </thead>
            <tbody class="table table-striped">
                <tr>
                    <th colspan="4">Bahan Baku</th>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 10px;">Persediaan Bahan Baku(awal)</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($bahanbakuawal>0)) {echo rupiah($bahanbakuawal);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td>Pembelian Bahan Baku</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($pembelianbahanbaku>0)) {echo rupiah($pembelianbahanbaku);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td>Persedian Bahan Baku(akhir)</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($bahanbakuakhir>0)) {echo rupiah($bahanbakuakhir);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td>Pemakaian Bahan Baku</td>
                    <th colspan="2" class="text-end" style="padding: 0 10%;"><?php if (($bahanbakuakhir>0)) {echo rupiah($pemakaianbahanbaku);} else {echo "0";} ?></td>
                </tr>

                <tr>
                    <th colspan="2">Upah langsung</th>
                    <th colspan="2" class="text-end" style="padding: 0 10%;"><?php if (($upahlangsung>0)) {echo rupiah($upahlangsung);} else {echo "0";} ?></th>
                </tr>
                <tr>
                    <th colspan="4">Biaya Overhead Pabrik</th>
                </tr>
                <tr>
                    <td></td>
                    <td>Upah Tidak Langsung</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($gajikaryawan>0)) {echo rupiah($upahtaklangsung);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td>Biaya Pemeliharaan Mesin</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($pemeliharaan>0)) {echo rupiah($pemeliharaan);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td>Biaya Perlengkapan Pabrik</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($perlengkapan>0)) {echo rupiah($perlengkapan);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="4">Jumlah Biaya Produksi</th>
                </tr>
                <tr>
                    <td></td>
                    <td>Persediaan Barang jadi(awal)</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($barangawal>0)) {echo rupiah($barangawal);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td>Jumlah Barang Dalam Proses</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($barangawal>0)) {echo rupiah($barangproses);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td>Persediaan Barang Jadi(akhir)</td>
                    <td class="text-end" style="padding: 0 10%;"><?php if (($barangakhir>0)) {echo rupiah($barangakhir);} else {echo "0";} ?></td>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="2">Harga Pokok Produksi</th>
                    <th colspan="2" class="text-end" style="padding: 0 10%;"><?php if (($barangakhir>0)) {echo rupiah($hargapokokproduksi);} else {echo "0";} ?></th>
                </tr>
            </tbody>
        </table>
    </div>

    <p align="right">
        <button id="btnExport" class="btn btn-success">Export to Excel</button>
        <button id="btn-export" onclick="exportHTML();" class="btn btn-primary">Export to Word</button>
    </p>                    

</div>



<!--FORM RAMALAN PENJUALAN -->
<div class="container">
    <h4 class="judul" style="margin:40px 0 10px 0;">3. Ramalan Penjualan</h4>
    <p class="isi-artikel"><b>Menurut Nafarin (2000:24)</b> ramalan penjualan merupakan proses kegiatan memperkirakan produk yang akan dijual pada waktu yang akan datang dalam keadaan tertentu dan dibuat berdasarkan data yang pernah terjadi dan atau mungkin akan terjadi. Metode yang digunakan sistem berikut yaitu metode trend least square.<br> <b>Metode trend Least Square</b> adalah metode analisis yang ditujukan untuk melakukan suatu peramalan pada masa yang akan datang dengan menentukan persamaan trend data yang mencakup analisis Time Series dengan dua kasus, yaitu kasus data genap dan ganjil.</p>

    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Ramalan" >
        Isi data
    </button> <br><br>

    <!-- Modal -->
    <div class="modal fade" id="Ramalan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form action="#source-html3" method="POST">

                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Isi data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                
                    <div class="modal-body">
                        <table class="table table-bordered border-primary">
                            <tbody>
                                <tr>
                                  <th>
                                    Nama Perusahaan :
                                  </th>
                                  <th>
                                    <input type="text" maxlength="40" class="form-control" name="nama-perusahaan" required>
                                  </th>
                                </tr>
                                <tr>
                                  <th>
                                    Nama Produk :
                                  </th>
                                  <th>
                                    <input type="text" maxlength="40" class="form-control" name="nama-produk3" required>
                                  </th>
                                </tr>
                                <tr>
                                  <th>
                                    Waktu Forecast (permintaan) :
                                  </th>
                                  <td>
                                    <select class="form-select" name="waktu3">
                                      <option value="Januari">Januari</option>
                                      <option value="Februari">Februari</option>
                                      <option value="Maret">Maret</option>
                                      <option value="April">April</option>
                                      <option value="Mei">Mei</option>
                                      <option value="Juni">Juni</option>
                                      <option value="Juli">Juli</option>
                                      <option value="Agustus">Agustus</option>
                                      <option value="September">September</option>
                                      <option value="Oktober">Oktober</option>
                                      <option value="November">November</option>
                                      <option value="Desember">Desember</option>
                                    </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <a href="#source-html3"><button type="submit" name="ramalanbtn" class="btn btn-primary">Simpan</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DATA RAMALAN PENJUALAN -->
<div class="container">
  <div id="source-html3">
    <table class="table table-striped text-center" id='table_wrapper3'>
      <thead class="table-primary">
        <tr>
          <th colspan="4">
            <h4 style="font-size: 20px;">Data Penjualan <?php for ($i=1; $i <= 12; $i++) { if(strtolower($bulan[$i]) === strtolower($waktu3)) { echo $bulan[$i-5]; echo " - "; echo $bulan[$i-1];}}?></h4>
            <h4 style="font-size: 20px;"><?php if (isset($perusahaan)) {echo "Pada Perusahaan $perusahaan"; } else {echo "Nama Perusahaan"; } ?></h4>
          </th>
          <tr>
            <th width="60%">Waktu</th>
            <th width="40%">Penjualan Produk <?php echo $produk; ?> (Unit)</th>
          </tr>
        </tr>
      </thead>
        <tbody>
        <?php 
          
          if (isset($_POST['ramalanbtn'])) { 
            for ($i=1; $i <= 12; $i++) { 
              if (strtolower($bulan[$i]) === strtolower($waktu3)) {
                if ($i-5 > 0) {
                  $x = $i-5;
                  $id = 1;
                  while($x < $i) {
        ?>
                    <tr>
                      <td><?php echo $bulan[$x] ?></td>
                      <td>
                        <input type="number" step="any" min="0" name="penjualan<?php echo $id; ?>" id="penjualan<?php echo $id; ?>" class="form-control" value="0">
                      </td>
                    </tr>
        <?php     $x++; $id++;} 
                } else if ($i-5 <= 0) { 
                    $x = $i-5;
                    $id = 1;
                    while($x < $i) {
        ?>
                    <tr>
                      <td><?php echo $bulan[$x] ?></td>
                      <td>
                        <input type="number" step="any" min="0" name="penjualan<?php echo $id; ?>" id="penjualan<?php echo $id; ?>" class="form-control" value="0">
                      </td>
                    </tr>
        <?php $x++; $id++;}
                }
              }
            }
          }
        ?>
        </tbody>
        </tfoot>
          <tr>
            <td>Ramalan Penjualan Pada Bulan <b><?php echo $waktu3; ?></b></td>
            <th>
              <input type="text" name="total" id="total" class="form-control" Readonly value="0">
            </th>
          </tr>
        </tfoot>
    </table>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript">
 
	$("#penjualan1").keyup(function(){   
		var penjualan1 = parseFloat($("#penjualan1").val());
		var penjualan2 = parseFloat($("#penjualan2").val());
		var penjualan3 = parseFloat($("#penjualan3").val());
		var penjualan4 = parseFloat($("#penjualan4").val());
		var penjualan5 = parseFloat($("#penjualan5").val());
		var a = (penjualan1+penjualan2+penjualan3+penjualan4+penjualan5)/5
        var b = (penjualan1*-2+penjualan2*-1+penjualan3*0+penjualan4*1+penjualan5*2)/10
        var f = Math.round(a+b*3)
		$("#total").val(f);
	});
	
	$("#penjualan2").keyup(function(){   
		var penjualan1 = parseFloat($("#penjualan1").val());
		var penjualan2 = parseFloat($("#penjualan2").val());
		var penjualan3 = parseFloat($("#penjualan3").val());
		var penjualan4 = parseFloat($("#penjualan4").val());
		var penjualan5 = parseFloat($("#penjualan5").val());
		var a = (penjualan1+penjualan2+penjualan3+penjualan4+penjualan5)/5
        var b = (penjualan1*-2+penjualan2*-1+penjualan3*0+penjualan4*1+penjualan5*2)/10
        var f = Math.round(a+b*3)
		$("#total").val(f);
	});
	
	$("#penjualan3").keyup(function(){   
		var penjualan1 = parseFloat($("#penjualan1").val());
		var penjualan2 = parseFloat($("#penjualan2").val());
		var penjualan3 = parseFloat($("#penjualan3").val());
		var penjualan4 = parseFloat($("#penjualan4").val());
		var penjualan5 = parseFloat($("#penjualan5").val());
		var a = (penjualan1+penjualan2+penjualan3+penjualan4+penjualan5)/5
        var b = (penjualan1*-2+penjualan2*-1+penjualan3*0+penjualan4*1+penjualan5*2)/10
        var f = Math.round(a+b*3)
		$("#total").val(f);
	});

	$("#penjualan4").keyup(function(){   
		var penjualan1 = parseFloat($("#penjualan1").val());
		var penjualan2 = parseFloat($("#penjualan2").val());
		var penjualan3 = parseFloat($("#penjualan3").val());
		var penjualan4 = parseFloat($("#penjualan4").val());
		var penjualan5 = parseFloat($("#penjualan5").val());
		var a = (penjualan1+penjualan2+penjualan3+penjualan4+penjualan5)/5
        var b = (penjualan1*-2+penjualan2*-1+penjualan3*0+penjualan4*1+penjualan5*2)/10
        var f = Math.round(a+b*3)
		$("#total").val(f);
	});

	$("#penjualan5").keyup(function(){   
		var penjualan1 = parseFloat($("#penjualan1").val());
		var penjualan2 = parseFloat($("#penjualan2").val());
		var penjualan3 = parseFloat($("#penjualan3").val());
		var penjualan4 = parseFloat($("#penjualan4").val());
		var penjualan5 = parseFloat($("#penjualan5").val());
		var a = (penjualan1+penjualan2+penjualan3+penjualan4+penjualan5)/5
        var b = (penjualan1*-2+penjualan2*-1+penjualan3*0+penjualan4*1+penjualan5*2)/10
        var f = Math.round(a+b*3)
		$("#total").val(f);
	});
</script>