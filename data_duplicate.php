<?php 

include("function/connection.php");

 ?>

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

    <title>Data Mining</title>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/jquery.dataTables.css" rel="stylesheet">

    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tugas Data Mining</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="data_duplicate.php">Data Error</a></li>
            <li><a href="data_bersih.php">Data bersih</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

    <div class="row">
    <div class="col-md-12 data-table">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Data Duplicate</div>
        <div class="panel-body">
        <!-- Table -->
        <table class="table table-striped data">
          <thead>
             <tr>
              <th>No</th>
              <th>Kode Peserta</th>
              <th>Jumlah Duplicate</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $query = mysqli_query($connect,"SELECT kd_peserta, SUM(kd_peserta) AS duplicate FROM table_1 GROUP BY kd_peserta HAVING SUM(kd_peserta) > 1 ");
            $no = 1;
            $total = 0;
            while($row = mysqli_fetch_assoc($query)){
              $total = $total + $row['duplicate'];
            ?>
                
                <tr>
                  <th><?php echo $no++; ?></th>
                  <th><?php echo $row['kd_peserta']; ?></th>
                  <th><?php echo $row['duplicate']; ?></th>
                </tr>

            <?php
            
            }

             ?>
        </tbody>
       </table>

          <strong>Total data yang duplicate : <?php echo $total; ?></strong>
        </div>
      </div>

      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Data Error</div>
        <div class="panel-body">
        <!-- Table -->
        <h4>Data yang memiliki Tanggal Lahir > Tanggal Daftar</h4>
        <table class="table table-striped data">
          <thead>
             <tr>
              <th>No</th>
              <th>Kode Peserta</th>
              <th>Tanggal Lahir</th>
              <th>Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $query = mysqli_query($connect,"SELECT * FROM table_1 WHERE tgl_lahir > tgl_daftar");
            $no = 1;
            $_SESSION['error_1'] = mysqli_num_rows($query);
            while($row = mysqli_fetch_assoc($query)){
              
            ?>
                
                <tr>
                  <th><?php echo $no++; ?></th>
                  <th><?php echo $row['kd_peserta']; ?></th>
                  <th><?php echo $row['tgl_lahir']; ?></th>
                  <th><?php echo $row['tgl_daftar']; ?></th>
                </tr>

            <?php
            $total2 = $no;
            }

             ?>
        </tbody>
       </table>

          <strong>Total data error : <?php echo $_SESSION['error_1']; ?></strong>

          <hr>
        <h4>Data yang memiliki Tanggal Daftar Kosong</h4>
        <table class="table table-striped data">
          <thead>
             <tr>
              <th>No</th>
              <th>Kode Peserta</th>
              <th>Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $query = mysqli_query($connect,"SELECT kd_peserta,tgl_daftar FROM table_1 WHERE tgl_daftar = ''");
            $no = 1;
            $_SESSION['error_2'] = mysqli_num_rows($query);
            while($row = mysqli_fetch_assoc($query)){
              
            ?>
                
                <tr>
                  <th><?php echo $no++; ?></th>
                  <th><?php echo $row['kd_peserta']; ?></th>
                  <th><?php echo $row['tgl_daftar']; ?></th>
                </tr>
      
            <?php

            }

             ?>
        </tbody>
       </table>
       <strong>Total data error : <?php echo $_SESSION['error_2']; ?></strong>
        <hr>
        <h4>Data yang memiliki Umur 0 tahun</h4>
       <table class="table table-striped data">
          <thead>
             <tr>
              <th>No</th>
              <th>Kode Peserta</th>
              <th>Umur</th>
            </tr>
          </thead>
          <tbody>
            <?php 

            $query = mysqli_query($connect,"SELECT kd_peserta,umur FROM table_1 WHERE umur = 0");
            $no = 1;
            $_SESSION['error_3'] = mysqli_num_rows($query);
            while($row = mysqli_fetch_assoc($query)){

            ?>
                
                <tr>
                  <th><?php echo $no++; ?></th>
                  <th><?php echo $row['kd_peserta']; ?></th>
                  <th><?php echo $row['umur']; ?></th>
                </tr>

            <?php
            
            }

             ?>
        </tbody>
       </table>
        <strong>Total data error : <?php echo $_SESSION['error_3']; ?></strong>
        </div>
      </div>

    </div>
    </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


  <script type="text/javascript">
    $(document).ready(function(){
      $('.data').DataTable();
    });
  </script>
  </body>
</html>
