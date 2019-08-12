<?php


include 'connect.php';

if(isset($_POST['edit_row']))
{
 $row=$_POST['row_id'];
 $qty=$_POST['qty'];


 mysqli_query($con, "update orders set qty='$qty' where id_order='$row'");
 // echo "update orders set qty='$qty' where id_order='$row'";
 echo "success";
 exit();
}

if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 mysqli_query($con,"delete from orders where id_order='$row_no'");
 echo "success";
 exit();
}


?>
