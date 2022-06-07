<h1 class="judul text-center" style="margin:40px 0 40px 0;">Simulasi Sistem Informasi Pemasaran</h1>

<?php 
    $waktu = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

    $data = [0,0,0,0,0,0,0,0,0,0,0,0];
    $produk = 'Produk';

    if(isset($_POST['tampil'])) {
        $data = $_POST['data'];
        $produk = $_POST['nama-produk'];
        $perusahaan = $_POST['nama-perusahaan'];
    }

?>

<div class="container">

    <h4 class="judul" style="margin:40px 0 10px 0;">Laporan Penjualan</h4>
    <p class="isi-artikel">Laporan penjualan berperan penting untuk pengambilan keputusan dalam bentuk pemasaran, harga, serta metode penjualan. Setiap laporan yang dibuat di dalam perusahaan tentu memiliki fungsinya sendiri, termasuk laporan penjualan. Secara tidak langsung laporan penjualan dapat berfungsi sebagai peluit untuk meningkatkan produktivitas bisnis. </p>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#penjualan" style="margin-bottom: 30px;">
        Isi data
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="penjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="#grafik" method="POST">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Isi Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Data Perusahaan</h4>
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <td>Nama Perusahaan :</td>
                                <th><input type="text" maxlength="40" class="form-control" name="nama-perusahaan"></th>
                            </tr>
                            <tr>  
                                <td>Nama Produk :</th>
                                <th><input type="text" maxlength="40" class="form-control" name="nama-produk"></td>
                            </tr>
                        </thead>
                    </table>
                    <h4>Data Penjualan Tahunan</h4>
                    <table class="table table-bordered border-primary text-center">
                        <thead >
                            <tr>
                                <th>Waktu</th>
                                <th width="500px">Data Penjualan (Unit)</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php for ($i=0; $i < count($waktu); $i++) { ?>
                            <tr>
                                <td><?php echo $waktu[$i]; ?></td>
                                <td><input type="number" min="0" max="100000000" class="form-control" name="data[]" value="<?php echo $data1[$i]; ?>"></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary" name="tampil">Simpan</button>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container" id="source-html">
    <table class="table table-bordered text-center" id='table_wrapper'>
        <thead class="table-primary">
            <tr>
                <th>Bulan</th>
                <th><?php if(!empty($produk)) {echo $produk;} else{echo"Produk";} ?></th>
            </tr>
        </thead>
        <tbody>
        <?php for ($i=0; $i < count($waktu); $i++) { ?>
            <tr>
                <td><?php echo $waktu[$i]; ?></td>
                <td><?php if(!empty($data[$i])) {echo $data[$i];} else {echo "0";}?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p align="right">
      <button id="btnExport" class="btn btn-success">Export to Excel</button>
      <button id="btn-export" onclick="exportHTML();" class="btn btn-primary">Export to Word</button>
    </p>
</div>


<div class="container" style="padding-top:50px;">
    <div id="grafik"></div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<Script>

    Highcharts.chart('grafik', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik Penjualan'
        },
        xAxis: {
            categories: <?php print_r(json_encode($waktu));?>
        },
        yAxis: {
            title: {
                text: 'Produk Terjual (Unit)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: <?php echo (json_encode($produk)); ?>,
            data: <?php print_r(json_encode($data,JSON_NUMERIC_CHECK)); ?>
        }]
    });

</Script>