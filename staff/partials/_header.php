<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Job Hunt | Staff <?= ucfirst(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));?></title>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
   <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <!-- Toastr -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/toastr/toastr.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="../assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Template Main CSS File -->
   <link href="../assets/adminlte/dist/css/adminlte.min.css" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
   <div class="wrapper">