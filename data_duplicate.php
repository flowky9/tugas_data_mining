<?php 

include("function/connection.php");
include("include/header.php");
 ?>


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
            // KODE PESERTA DUPLICAT
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
            // TANGGAL LAHIR > TGL DAFTAR
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
        <h4>Data yang memiliki nilai kosong</h4>
        <table class="table table-striped data">
          <thead>
             <tr>
              <th>No</th>
              <th>Kode Peserta</th>
              <th>Tanggal Daftar</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Jenis Kelamin</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            // DATA KOSONG
            $query = mysqli_query($connect,"SELECT * FROM table_1 WHERE tgl_daftar = '' OR kd_peserta='' OR tgl_lahir='' OR umur = '' OR jenis_kelamin = ''");
            $no = 1;
            $_SESSION['error_2'] = mysqli_num_rows($query);
            while($row = mysqli_fetch_assoc($query)){
              
            ?>
                
                <tr>
                  <th><?php echo $no++; ?></th>
                  <th><?php echo $row['kd_peserta']; ?></th>
                  <th><?php echo $row['tgl_daftar']; ?></th>
                  <th><?php echo $row['tgl_lahir']; ?></th>
                  <th><?php echo $row['umur']; ?></th>
                  <th><?php echo $row['jenis_kelamin']; ?></th>
                </tr>
      
            <?php

            }

             ?>
        </tbody>
       </table>
       <strong>Total data error : <?php echo $_SESSION['error_2']; ?></strong>
        <hr>
        <!-- data inkonsisten -->
        <h4>Data Tidak Konsisten</h4>
        <table class="table table-striped data">
          <thead>
             <tr>
              <th>No</th>
              <th>Jenis Kelamin</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            // DATA INKONSISTEN
            $query = mysqli_query($connect,"SELECT DISTINCT jenis_kelamin FROM table_1");
            $no = 1;
            $_SESSION['error_2'] = mysqli_num_rows($query);
            while($row = mysqli_fetch_assoc($query)){
              $jk = $row['jenis_kelamin'];
              $query_jumlah = mysqli_query($connect,"SELECT * FROM table_1 WHERE jenis_kelamin = '$jk'");
              $jumlah_row = mysqli_num_rows($query_jumlah);
            ?>
                
                <tr>
                  <th><?php echo $no++; ?></th>
                  <th><?php echo $row['jenis_kelamin']; ?></th>
                  <th><?php echo $jumlah_row; ?></th>
                </tr>
      
            <?php

            }

             ?>
        </tbody>
       </table>
       <strong>Total data error : <?php echo $_SESSION['error_2']; ?></strong>
        <hr>
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
