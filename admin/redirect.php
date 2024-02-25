<?php
session_start();
if (isset($_SESSION['dept'])) {
   require '../db/dbconn.php';
   $id = $_SESSION['dept'];

   $query = "SELECT * FROM systems WHERE id=$id AND sys_true=1";
   $result = mysqli_query($conn, $query);
   $row =  $result->fetch_assoc();

   if ($row['id']) {
      $_SESSION['jobhub'] = true;
      $_SESSION['dept'] = $id;

      $deptName = str_replace(' ', '-', strtolower($row['name']));
      $message = base64_encode('success~Login successful!');
      header('Location: ../' . $deptName . '/?m=' . $message);
      exit();
   } else {
      session_destroy();
      $message = base64_encode('danger~System does not exist yet!');
      header('Location: login?m=' . $message);
      exit();
   }
} else {
   $message = base64_encode('danger~Something went wrong!');
   header('Location: login?m=' . $message);
}
