<form action="" method="POST">
    <input type="text" name="rupiah1" id="dengan-rupiah"/>
    <input type="text" name="rupiah2" id="tanpa-rupiah"/>
    <button name="submit">submit</button>
</form>


<?php 

    $rupiah1 = $_POST['rupiah1'];
    $rupiah2 = $_POST['rupiah2'];

    if (isset($_POST['submit'])) {
        echo $rupiah1*$rupiah2;
    };
?>


<script type="text/javascript">

    var dengan_rupiah = document.getElementById('dengan-rupiah');
        dengan_rupiah.addEventListener('keyup', function(e)
        {
            dengan_rupiah.value = formatRupiah(this.value);
        });

    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
        tanpa_rupiah.addEventListener('keyup', function(e)
        {
            tanpa_rupiah.value = formatRupiah(this.value);
        });
        
        /* Fungsi */
        function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

</script>