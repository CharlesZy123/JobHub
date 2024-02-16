<?php
session_start();
include("../connection.php");
if(!isset($_SESSION['user_id'])){
   header("Location: welcome/index");
}else{
   if(isset($_SESSION['user_id'])){
      echo 'Hi!';
      // header("Location: User/user-mainpage.php");
   }else{
      // header("Location: Admin/mainpage.php");
   }
}
?>