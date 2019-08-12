
<?php
session_start();
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

include 'control/connect.php';
error_reporting(1);
$return_arr = array();


$obj1->type = 0;//text
$obj1->content = 'CODER Coffee';//any string
$obj1->bold = 1;//0 if no, 1 if yes
$obj1->align =2;//0 if left, 1 if center, 2 if right
$obj1->format = 3;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width
array_push($return_arr,$obj1);

$obj2->type = 0;//text
$obj2->content = 'wwww.codercoffee.id';//any string
$obj2->bold = 0;//0 if no, 1 if yes
$obj2->align =2;//0 if left, 1 if center, 2 if right
$obj2->format = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width
array_push($return_arr,$obj2);

$obj3->type = 0;//text
$obj3->content ='Sub Total';//any string
$obj3->bold = 0;//0 if no, 1 if yes
$obj3->align =2;//0 if left, 1 if center, 2 if right
$obj3->format = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width
array_push($return_arr,$obj3);

$obj4->type = 0;//text
$obj4->content =$_SESSION['subtotal'];//any string
$obj4->bold = 0;//0 if no, 1 if yes
$obj4->align =2;//0 if left, 1 if center, 2 if right
$obj4->format = 0;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width
array_push($return_arr,$obj4);

$fetch = mysqli_query($con,"select orders.cashier, orders.clear, orders.transaksi, orders.id_order, menu.name, menu.price, orders.qty, orders.id_menu, menu.id_menu, orders.dt from orders,menu where menu.id_menu=orders.id_menu and clear='N' and transaksi='penjualan' and orders.cashier='N' order by orders.id_order desc ");

while ($row = mysqli_fetch_assoc($fetch )) {
    $total=$row['price']*$row['qty'];
    $row_array['type'] = 0;
    $row_array['content'] = "$row[qty] x $row[price] ($total) $row[name]";
    $row_array['bold'] =0;
    $row_array['align'] =0;
    $row_array['format'] =0;

    array_push($return_arr,$row_array);
}


echo json_encode($return_arr,JSON_FORCE_OBJECT);


 ?>
