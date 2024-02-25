<?php
session_start();
if (isset($_GET['id'])) {
   require '../db/dbconn.php';
   $id = $_GET['id'];

   $query = "SELECT * FROM systems WHERE id=$id AND sys_true=1";
   $result = mysqli_query($conn, $query);
   $row =  $result->fetch_assoc();

   if ($row['id']) {
      $_SESSION['jobhub'] = true;
      $_SESSION['sys_true'] = true;
      $_SESSION['dept'] = $id;

      $deptName = str_replace(' ', '-', strtolower($row['name']));
      $message = base64_encode('success~Welcome to the '.strtoupper($deptName).' system!');
      header('Location: ../' . $deptName . '/?m='.$message);
      exit();
   } else {
      $message = base64_encode('danger~System is offline!');
      header('Location: dashboard?m=' . $message);
   }
} else {
   $message = base64_encode('danger~Something went wrong!');
   header('Location: dashboard?m=' . $message);
}
