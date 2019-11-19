<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="views/plugins/sweetalert2/sweetalert2.min.css">

  <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="views/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!-- sweetalert2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>

</head>
<body class="hold-transition <?php echo ( isset($_SESSION['beginSession']) && $_SESSION['beginSession'] == 'ok' ) ? 'skin-blue sidebar-collapse sidebar-mini' : 'login-page' ; ?>">

  <?php
    if( isset($_SESSION['beginSession']) && $_SESSION['beginSession'] == 'ok' ){
      echo '<div class="wrapper">';
      include "module/header.php";
      include "module/menu.php";

      if( isset($_GET['route']) ){
        if( 
          $_GET['route'] == 'home' || 
          $_GET['route'] == 'users' || 
          $_GET['route'] == 'categories' || 
          $_GET['route'] == 'products' || 
          $_GET['route'] == 'clients' || 
          $_GET['route'] == 'sales' || 
          $_GET['route'] == 'create-sales' || 
          $_GET['route'] == 'reports' ||
          $_GET['route'] == 'logout'
        ){
          include "module/".$_GET['route'].".php";
        }else{
          include "module/404.php";
        }
      }else{
        include "module/home.php";
      }

      include "module/footer.php";
      echo '</div>';
    }else{
      include "module/login.php";
    }
    
  ?>

<script src="views/js/template.js"></script>
<script src="views/js/users.js"></script>
<script src="views/js/categories.js"></script>
</body>
</html>
