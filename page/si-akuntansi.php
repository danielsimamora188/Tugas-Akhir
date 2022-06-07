<?php 
    $result = mysqli_query($conn,"SELECT * FROM artikel_bacaan WHERE id_judul=7");
?>

    <?php 
        if (mysqli_num_rows($result) > 0) {
            while($artikel = mysqli_fetch_assoc($result)){
    ?>
        <a>
            <div class="container" style="padding:0 10%;">
                <h1 class="judul" data-aos="fade-left" data-aos-duration="1000"><?php echo $artikel['judul']?></h1>
                <?php if(!empty($artikel['gambar'])){ ?>
                    <img src='admin/CRUD/gambar/<?php echo $artikel['gambar'] ?>' class="gambar-artikel" data-aos='fade-left' data-aos-duration='2000'>
                <?php } ?>
                <a class="isi-artikel" data-aos="fade-left" data-aos-duration="1000"><?php echo $artikel['isi']?></a>
            </div>
        </a>
        <?php }} ?>
        