<h1 class="judul text-center" style="margin:40px 0 40px 0;">Simulasi Sistem Informasi Akuntansi</h1>


<?php 
    include("function.php");

    $no = 0;
    $col = @$_POST['col'];
    $tanggal = @$_POST['tanggal'];
    $kategori = @$_POST['kategori'];
    $nama = @$_POST['nama'];

    $debit1 = @$_POST['debit'];
    $debit = str_replace(".", "", $debit1);
    
    $kredit1 = @$_POST['kredit'];
    $kredit = str_replace(".", "", $kredit1);

?>

<div class="container">
    
    <h4 class="judul" id="jurnal-umum" style="margin:40px 0 10px 0;">1. Jurnal Umum</h4>
    <p class="isi-artikel">jurnal umum adalah sebuah jurnal yang dipergunakan untuk tempat melakukan pencatatan bagi segala jenis bukti transaksi keuangan pada perusahaan dalam suatu periode tertentu. Jurnal digunakan untuk mencatat setiap transaksi yang terjadi dalam perusahaan. Tiap perubahan kekayaan, modal, biaya, dan pendapatan harus terlebih dahulu dicatat ke dalam jurnal umum, agar pembuatan laporan keuangan perusahaan dapat dilakukan secara lengkap.</p>
    
    <!--TAMBAH TRANSAKSI-->
    <button class="btn btn-primary" style="margin-bottom: 30px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Jumlah Transaksi</button>

    <!-- MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="#jurnal-umum" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Isi data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <input class="form-control" type="number" min="0" max="100000000" placeholder="Jumlah Transaksi" name="col">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <form action="#buku-besar" method="POST">
    <table class="table table-primary">

        <thead>
            <tr class="text-center">
                <th>Tanggal</th>
                <th>Kategori Transaksi</th>
                <th>Nama Transaksi</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>

        <tbody class="table-secondary">
            <tr>
                <td><input class="form-control" type="date" name="tanggal[]" required></td>
                <td><input class="form-control" type="text" name="kategori[]" placeholder="SDM..." required></td>
                <td><input class="form-control" type="text" name="nama[]" placeholder="Pembayaran Gaji..." required></td>
                <td>
                    <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Rupiah" name="debit[]"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                    <span class="input-group-text">.00</span>
                    </div>
                </td>
                <td>
                    <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Rupiah" name="kredit[]"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                    <span class="input-group-text">.00</span>
                    </div>
                </td>
            </tr>
            
            <?php if (isset($_POST['kirim'])) { 
                while ($no+1 < $col) { ?>
            <tr>
                <td><input class="form-control" type="date" name="tanggal[]" required></td>
                <td><input class="form-control" type="text" name="kategori[]" required></td>
                <td><input class="form-control" type="text" name="nama[]" required></td>
                <td>
                    <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Rupiah" name="debit[]"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" >
                    <span class="input-group-text">.00</span>
                    </div>
                </td>
                <td>
                    <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Rupiah" name="kredit[]"  id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" >
                    <span class="input-group-text">.00</span>
                    </div>
                </td>
            </tr>
            <?php $no++;} ?>
            <?php } ?>
        </tbody>

    </table>
    <button type="submit" name="proses" class="btn btn-primary" style="margin-bottom: 30px;">Kirim</button>
    </form>        

    <?php if (isset($_POST['proses'])) { ?>
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <button class="btn btn-warning btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Aktifkan Filter</button>
                </h3>
            </div>
            <table class="table table-bordered table-primary" style="margin-bottom: 30px;">
                <thead>
                    <tr>
                        <th colspan="5" class="text-center"><h4>Tabel Daftar Transaksi</h4></th>
                    </tr>
                    <tr class="filters">
                        <th width="200px"><input type="number" class="form-control" placeholder="Tanggal" disabled></th>
                        <th width="200px"><input type="text" class="form-control" placeholder="Kategori" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nama Transaksi" disabled></th>
                        <th><input type="number" min="0" max="100000000" class="form-control" placeholder="Debit" disabled></th>
                        <th><input type="number" min="0" max="100000000" class="form-control" placeholder="Kredit" disabled></th>
                    </tr>
                </thead>
                <tbody class="table">
                    <?php foreach ($kategori as $row) { ?>
                    <tr>
                        <td><?php echo format_tanggal($tanggal[$no]); ?></td>
                        <td><?php echo $kategori[$no]; ?></td>
                        <td><?php echo $nama[$no]; ?></td>
                        <td><?php if(!empty($debit[$no])) { echo rupiah($debit[$no]); } else {echo "-";} ?></td>
                        <td><?php if(!empty($kredit[$no])) { echo rupiah($kredit[$no]); } else {echo "-";} ?></td>
                    </tr>
                    <?php $no++;} ?>
                </tbody>
                <tr>
                    <th colspan="3">jumlah</th>
                    <th><?php echo rupiah(array_sum($debit)); ?></th>
                    <th><?php echo rupiah(array_sum($kredit)); ?></th>
                </tr>
            </table>
        </div>
    <?php } ?>
</div>

<script>
function checkval(){1==$("tbody tr:visible").length&&"No result found"==$("tbody tr:visible td").html()?$("#rowcount").html("0"):$("#rowcount").html($("tr:visible").length-1)}$(document).ready(function(){$("#rowcount").html($(".filterable tr").length-1),$(".filterable .btn-filter").click(function(){var t=$(this).parents(".filterable"),e=t.find(".filters input"),l=t.find(".table tbody");1==e.prop("disabled")?(e.prop("disabled",!1),e.first().focus()):(e.val("").prop("disabled",!0),l.find(".no-result").remove(),l.find("tr").show()),$("#rowcount").html($(".filterable tr").length-1)}),$(".filterable .filters input").keyup(function(t){if("9"!=(t.keyCode||t.which)){var e=$(this),l=e.val().toLowerCase(),n=e.parents(".filterable"),i=n.find(".filters th").index(e.parents("th")),r=n.find(".table"),o=r.find("tbody tr"),d=o.filter(function(){return-1===$(this).find("td").eq(i).text().toLowerCase().indexOf(l)});r.find("tbody .no-result").remove(),o.show(),d.hide(),d.length===o.length&&r.find("tbody").prepend($('<tr class="no-result text-center"><td colspan="'+r.find(".filters th").length+'">No result found</td></tr>'))}$("#rowcount").html($("tr:visible").length-1),checkval()})});

</script>