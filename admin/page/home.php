<?php

    include("CRUD/connection.php");
    $si = mysqli_query($conn,'SELECT COUNT(*) AS jumlah FROM artikel_bacaan WHERE id_judul=1');
    $resultsi = mysqli_fetch_array($si);

    $sim = mysqli_query($conn,'SELECT COUNT(*) AS jumlah FROM artikel_bacaan WHERE id_judul=2');
    $resultsim = mysqli_fetch_array($sim);

    $sip = mysqli_query($conn,'SELECT COUNT(*) AS jumlah FROM artikel_bacaan WHERE id_judul=3');
    $resultsip = mysqli_fetch_array($sip);

    $simm = mysqli_query($conn,'SELECT COUNT(*) AS jumlah FROM artikel_bacaan WHERE id_judul=4');
    $resultsimm = mysqli_fetch_array($simm);

    $sdm = mysqli_query($conn,'SELECT COUNT(*) AS jumlah FROM artikel_bacaan WHERE id_judul=5');
    $resultsdm = mysqli_fetch_array($sdm);

    $sik = mysqli_query($conn,'SELECT COUNT(*) AS jumlah FROM artikel_bacaan WHERE id_judul=6');
    $resultsik = mysqli_fetch_array($sik);

    $sia = mysqli_query($conn,'SELECT COUNT(*) AS jumlah FROM artikel_bacaan WHERE id_judul=7');
    $resultsia = mysqli_fetch_array($sia);
?>


<div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="card-counter text-white bg-primary mb-3" style="padding: 5px; border-radius:6px; height: 110px;">
                <p><?php echo $resultsi['jumlah'];  ?></p>
                <p style="font-size:14px;">Sistem Informasi</p>
            </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter text-white bg-warning mb-3" style="padding: 5px; border-radius:6px; height: 110px;">
                <i class="fa fa-ticket"></i>
                <p><?php echo $resultsim['jumlah'];  ?></p>
                <p style="font-size:14px;">Sistem Informasi Manajemen</p>
            </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter text-white bg-success mb-3" style="padding: 5px; border-radius:6px; height: 110px;">
                <i class="fa fa-ticket"></i>
                <p><?php echo $resultsip['jumlah'];  ?></p>
                <p style="font-size:14px;">Sistem Informasi Pemasaran</p>
            </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter text-white bg-danger mb-3" style="padding: 5px; border-radius:6px; height: 110px;">
                <i class="fa fa-ticket"></i>
                <p><?php echo $resultsimm['jumlah'];  ?></p>
                <p style="font-size:14px;">Sistem Informasi Manufaktur</p>
            </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter text-white bg-success mb-3" style="padding: 5px; border-radius:6px; height: 110px;">
                <i class="fa fa-ticket"></i>
                <p><?php echo $resultsdm['jumlah'];  ?></p>
                <p style="font-size:14px;">Sistem Informasi SDM</p>
            </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter text-white bg-danger mb-3" style="padding: 5px; border-radius:6px; height: 110px;">
                <i class="fa fa-ticket"></i>
                <p><?php echo $resultsik['jumlah'];  ?></p>
                <p style="font-size:14px;">Sistem Informasi Keuangan</p>
            </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter text-white bg-primary mb-3" style="padding: 5px; border-radius:6px; height: 110px;">
                <i class="fa fa-ticket"></i>
                <p><?php echo $resultsia['jumlah'];  ?></p>
                <p style="font-size:14px;">Sistem Informasi Akuntansi</p>
            </div>
        </div>

    </div>
</div>
<br><br><br>
<div class="container">
<table class="table table-bordered">
  <thead class="table-primary">
    <tr class="text-center">
      <th scope="col">No.</th>
      <th scope="col">Artikel</th>
      <th scope="col" >Jumlah Artikel</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="text-center">1</th>
      <td>Sistem Informasi</td>
      <td class="text-center"><?php echo $resultsi['jumlah'];  ?></td>
    </tr>
    <tr>
      <th scope="row" class="text-center">2</th>
      <td>Sistem Informasi Manajemen</td>
      <td class="text-center"><?php echo $resultsim['jumlah'];  ?></td>
    </tr>
    <tr>
      <th scope="row" class="text-center">3</th>
      <td>Sistem Informasi Pemasaran</td>
      <td class="text-center"><?php echo $resultsip['jumlah'];  ?></td>
    </tr>
    <tr>
      <th scope="row" class="text-center">4</th>
      <td>Sistem Informasi Manufaktur</td>
      <td class="text-center"><?php echo $resultsimm['jumlah'];  ?></td>
    </tr>
    <tr>
      <th scope="row" class="text-center">5</th>
      <td>Sistem Informasi SDM</td>
      <td class="text-center"><?php echo $resultsdm['jumlah'];  ?></td>
    </tr>
    <tr>
      <th scope="row" class="text-center">6</th>
      <td>Sistem Informasi Keuangan</td>
      <td class="text-center"><?php echo $resultsik['jumlah'];  ?></td>
    </tr>
    <tr>
      <th scope="row" class="text-center">7</th>
      <td>Sistem Informasi Akuntansi</td>
      <td class="text-center"><?php echo $resultsia['jumlah'];  ?></td>
      
    </tr>
  </tbody>
</table>