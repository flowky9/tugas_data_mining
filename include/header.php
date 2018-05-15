<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>
      <?php
        
        if(isset($_GET['data_invalid'])){
          echo "Data Tidak Valid";
        }else if(isset($_GET['data_clean'])){
          echo "Data Bersih";
        }else if(isset($_GET['conclusion'])){
          echo "kesimpulan";
        }else {
          echo "Home - Data Yang akan di bersihkan";
        }

      ?>
    </title>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">


    
  </head>

  <body>

<?php include('include/nav.php'); ?>