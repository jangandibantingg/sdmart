
<?php
date_default_timezone_set('Asia/Jakarta');
include 'connect.php';
session_start();

if(isset($_POST["place_order"]))
{
     $order_id = "";
     $_SESSION["order_id"] = $order_id;
     $order_details = "";
     foreach($_SESSION["shopping_cart"] as $keys => $values)
     {
          if ($_GET['act'] == 'penjualan') {
            $transaksi='penjualan';
          }else{
            $transaksi='pembelian';
          }
          $order_details .= "
          INSERT INTO orders(id_menu,transaksi,dt,kode_item, price, qty,username,date)
          VALUES('".$values["product_id_menu"]."','".$transaksi."','".$date."', '".$values["product_id"]."', '".$values["product_price"]."', '".$values["product_quantity"]."','".$_SESSION['user_session']."','".$datetime."');
          ";
          // echo "$order_details";
     }
     if(mysqli_multi_query($con, $order_details))
     {
          unset($_SESSION["shopping_cart"]);

          echo "<script>window.location.href='../?page=$transaksi&act=success'</script>";
     }
}
?>
