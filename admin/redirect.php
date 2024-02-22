<?php
session_start();
if (isset($_SESSION['dept'])) {
   $dept = $_SESSION['dept'];
   $_SESSION['jobhub'] = true;

   switch ($dept) {
      case 1:
         header('');
         break;
      case 2:
         header('');
         break;
      case 3:
         header('');
         break;
      case 4:
         $message = base64_encode('success~Login successful!');
         header('Location: ../piso/index?m='.$message);
         // echo "<script>alert('$message')</script>";
         exit();
         break;
      case 5:
         header('');
         break;
      default:
         header('Location: dashboard');
         break;
   }
} else {
   $message = base64_encode('danger~Something went wrong!');
   header('Location: login?m=' . $message);
}
