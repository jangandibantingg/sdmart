<?php
     date_default_timezone_set('Asia/Jakarta');
     session_start();
     include 'connect.php';

     if($_POST['nama'] != ''   ){
         $nama    = $_POST['nama'];
         $email   = $_POST['email'];
         $alamat  = $_POST['alamat'];
         $sponsoring  = $_POST['sponsoring'];

         $no_hp   = $_POST['no_hp'];
         $rd      = $date;
         $password = md5("1234");
         $numb=mysqli_num_rows(mysqli_query($con, "select * from user"));
         $char = "SDM";
         $kode = $char . sprintf("%07s", $numb);

         mysqli_query($con, "insert into user (nama, email, alamat, level, rd, password,no_hp, sponsoring,id)
         values ('$nama','$email','$alamat','ID','$rd','$password','$no_hp','$sponsoring','$kode') ");
         echo "<div class='alert alert-success alert-dismissible'> data berhasil dimasukan  </div>";
         echo " <script type='text/javascript'> window.location.href = './sponsoring.aspx' </script>";
     }else{
        echo "<div class='alert alert-danger alert-dismissible'>masukan data dengan lengkap</div>";


     }


  ?>
