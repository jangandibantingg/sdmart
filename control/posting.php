
<?php

include 'connect.php';
session_start();
var_dump($_POST);

if(isset($_POST['dana']))
{
$from=$_POST['from'];
$until=$_POST['until'];
$dana =$_POST['dana'];
$transaksi=$_GET['act'];
$keterangan = "<p>transaksi $transaksi periode $from s/d $until <small><i>diposing oleh $_SESSION[user_session]</i></small> </p>";
if($transaksi == 'pembelian' ){
   $kredit=$dana;
   $debit =0;
}else{
  $kredit=0;
  $debit =$dana;
}



 mysqli_query($con, "insert into arus_khas (debit,kredit,keterangan,id_subkategori_khas,dt,orders) values ('$debit','$kredit','$keterangan','12','$date','Y')");
 mysqli_query($con, "update orders set clear='Y' where dt between '$from' and '$until' ");
 header('location:../khas.aspx');

}




 ?>
