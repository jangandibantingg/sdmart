<?php
     date_default_timezone_set('Asia/Jakarta');

     include 'connect.php';

     if($_POST['nama'] != '' && $_POST['email'] !='' && $_POST['no_hp'] !='' && $_POST['alamat'] !=''  && $_POST['level'] !=''  ){
         $nama    = $_POST['nama'];
         $email   = $_POST['email'];
         $alamat  = $_POST['alamat'];
         $level   = $_POST['level'];
         $no_hp   = $_POST['no_hp'];
         $sponsoring  = $_POST['sponsoring'];
         $rd      = $date;
         $password = md5("1234");

         $numb=mysqli_num_rows(mysqli_query($con, "select * from user"));
         $char = "SDM";
         $kode = $char . sprintf("%07s", $numb);

         mysqli_query($con, "insert into user (nama, email, alamat, level, rd, password,no_hp, sponsoring,id)
         values ('$nama','$email','$alamat','$level','$rd','$password','$no_hp','$sponsoring','$kode') ");
         echo "<div class='alert alert-success alert-dismissible'> data berhasil dimasukan  </div>";
         echo " <script type='text/javascript'> window.location.href = './akun.aspx' </script>";

     }else{
        echo "<div class='alert alert-danger alert-dismissible'>masukan data dengan lengkap</div>";


     }


  ?>
