<?php session_start();
require('../db/dbconn.php');

if (!isset($_SESSION['admin_id'])) {
   header("Location: login");
   exit();
} elseif (isset($_SESSION['jobhub'])) {
   header("Location: redirect");
   exit();
}

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $query = "DELETE FROM admins WHERE id='$id'";
   $result = mysqli_query($conn, $query);

   $message = base64_encode('success~Admin deleted successfully!');
   header("Location: manage-admin?m=" . $message);
   exit();
} else {
   $message = base64_encode('danger~Something went wrong!');
   header("Location: manage-admin?m=" . $message);
   exit();
}
