<?php
session_start();
if(!isset($_SESSION['user_id'])){
   header("Location: welcome/index");
}else{
   if(isset($_SESSION['user_id'])){
      header("Location: user/dashboard");
   }else{
   }
}
?>