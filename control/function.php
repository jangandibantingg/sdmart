<?php
include 'connect.php';

//hitung khas
function khastoday($con,$today){
  $data="hello word";
  return $data;
}
//tanggal indo
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
//hitung posingan

function transaksi($con, $jenis, $from, $until, $clear){
  $a=mysqli_query($con, "SELECT * FROM orders where clear='$clear' and transaksi='$jenis' and dt between '$from' and '$until' " );
  while ($r=mysqli_fetch_array($a)) {
    // code...
    $total=$r['qty']*$r['price'];
    $subtotal=$subtotal+$total;
  }
  // $sql="SELECT * FROM orders where clear='$clear' and transaksi='$jenis' and dt between '$from' and '$until' ";
 return $subtotal;
}

function pengeluaran($con,  $from, $until, $posting){
  $a=mysqli_query($con, "SELECT * FROM arus_khas where posting='$posting' and orders='N' and dt between '$from' and '$until' " );
  while ($r=mysqli_fetch_array($a)) {
    // code...
    $total=$r['kredit'];
    $subtotal=$subtotal+$total;
  }
  // $sql="SELECT * FROM orders where clear='$clear' and transaksi='$jenis' and dt between '$from' and '$until' ";
 return $subtotal;
}



 ?>
