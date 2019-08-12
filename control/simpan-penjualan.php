<?php
session_start();
$act=$_GET['pros'];

if ($act == 'penjualan') {
  include 'connect.php';
  mysqli_query($con, "update orders set cashier='Y', id='$_SESSION[id]' where cashier='N' and transaksi='penjualan' and username='$_SESSION[user_session]'");
  echo "<script>window.location.href='../?page=$act&act=success'</script>";


}

 ?>
