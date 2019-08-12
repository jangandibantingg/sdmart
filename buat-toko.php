<?php
session_start();
include 'connect.php';
include 'fungsi_thumb.php';
error_reporting(0);


$lokasi_file    = $_FILES['no_ktp']['tmp_name'];
$tipe_file      = $_FILES['no_ktp']['type'];
$nama_file      = $_FILES['no_ktp']['name'];


$nama_toko=$_POST['nama_toko'];
$city_id=$_POST['city_id'];
$alamat=$_POST['alamat'];
$email=$_SESSION['user_session'];
$no_ktp=$_POST['no_ktp'];
$no_npwp=$_POST['no_npwp'];
$url=$_POST['url'];

//
$jenis_toko=$_POST['jenis_toko'];
$no_bpom=$_POST['no_bpom'];
$sk=$_POST['sk'];
$akta=$_POST['akta'];
$izinusaha=$_POST['izinusaha'];
$izinmikro=$_POST['izinmikro'];
$hki=$_POST['hki'];
$jenis_usaha=$_POST['jenis_usaha'];
$skdu=$_POST['skdu'];
$pkp=$_POST['pkp'];
$mui=$_POST['mui'];
$lab=$_POST['lab'];
$sni=$_POST['sni'];

$c=mysqli_query($con, "select * from toko where email='$_SESSION[user_session]'");
$numb=mysqli_num_rows($c);
$numbnama=mysqli_query($con, "select * from toko where nama_toko='$nama_toko'");
$numburl=mysqli_query($con, "select * from toko where url='$nama_toko'");
if ( $numb > 0 ) {
   echo "<script>$('.info').notify('anda sudah membuat toko', 'warn');</script>";

}elseif (mysqli_num_rows($numbnama) > 0) {
  ?>

  <script type="text/javascript">
    $('.info').notify("nama toko tidak tersedia coba ganti yang lain", "warn");
  </script>
  <?php
 echo "";
}elseif (mysqli_num_rows($numburl) > 0) {
  ?>
  <script type="text/javascript">
    $('.info').notify("url toko tersedia coba ganti yang lain", "warn");
  </script>
  <?php
 echo "";
}elseif (  !empty ( $nama_toko && $city_id && $alamat && $email && $no_ktp && $no_npwp && $url ) ) {

  mysqli_query($con," insert into toko (nama_toko,city_id,alamat,email,no_ktp,no_npwp,url,jenis_toko,no_bpom,sk,akta,izinusaha,izinmikro,hki,jenis_usaha,skdu,pkp,mui,lab,sni)
              values ('$nama_toko','$city_id','$alamat','$email','$no_ktp','$no_npwp','$url','$jenis_toko','$no_bpom','$sk','$akta','$izinusaha','$izinmikro','$hki','$jenis_usaha','$skdu','$pkp','$mui','$lab','$sni') ");
  echo "<script type='text/javascript'> window.location.href = './?page=profile&act=daftar-produk' </script>";


?>

<script type="text/javascript">
  $('.info').notify("toko berhasil dibuat","success");
</script>

<?php
}else {
  ?>
<script type="text/javascript">
  $('.info').notify("data belum lengkap", "warn");
</script>
<?php
}
 ?>
