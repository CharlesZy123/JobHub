<?php
session_start();
if(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) != "login"){
   if(!isset($_SESSION['admin_id'])){
      header("Location: login");
      exit();
   }
}

function echoSideBarClass() {
   $current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

   if($current_page == 'login'){
      echo 'login-page';
   } else {
      echo 'sidebar-mini layout-fixed';
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>JobHub | Admin - <?php if (basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == "index" || basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == "piso") { echo 'Welcome'; } else { echo ucfirst(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))); } ?></title>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
   <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
   <!-- DataTables -->
  <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <!-- Toastr -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/toastr/toastr.min.css">
   <!-- jQuery -->
   <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
   <!-- Template Main CSS File -->
   <link href="../assets/adminlte/dist/css/adminlte.min.css" rel="stylesheet">
</head>

<body class="hold-transition <?php echoSideBarClass(); ?>">