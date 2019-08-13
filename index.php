<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
require_once "control/db.php";
require_once "control/User.php";
include			 "control/connect.php";
require_once "control/uploadfile.php";
require_once "control/function.php";


if (isset($_GET['page'])) { 
  $page= $_GET['page'];
}

$user = new User($db);

if(!$user->isLoggedIn()){
    include 'view/gate.php';
}else {
  $member = $user->getuser($_SESSION['user_session']);
  include "view/body.php";
}
// include "view/body.php";
?>
