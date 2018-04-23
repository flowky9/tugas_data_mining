<?php

include("function/connection.php");
$query = mysqli_query($connect,"SELECT * FROM table_1");

for ($i=1; $i <= 12; $i++) { 
    $query_bulan = mysqli_query($connect,"SELECT * FROM table_1 WHERE MONTH(tgl_daftar) = $i ");
    $bulan[$i] = mysqli_num_rows($query_bulan);
}

$pr = mysqli_query($connect,"SELECT * FROM table_1 WHERE jenis_kelamin = 'perempuan'");
$lk = mysqli_query($connect,"SELECT * FROM table_1 WHERE jenis_kelamin = 'Laki-Laki'");
$pr_count = mysqli_num_rows($pr);
$lk_count = mysqli_num_rows($lk);

// echo $pr_count;
// echo "<br>";
// echo $lk_count;
// echo "<br>";
// echo $bulan[8];


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
    <script src="js/Chart.bundle.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">


    
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
            <li><a href="data_bersih.php">Data Bersih</a></li>
            <li><a href="kesimpulan.php">Grafik</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    
    <div class="row">

        <div class="container-chart">
            <canvas id="myChart1" width="100" height="100"></canvas>
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
    </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


        <script>

            var ctx = document.getElementById("myChart1");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Januari','Februari','Mart','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                    datasets: [{
                            label: 'Grafik pendaftaran',
                            data: [<?php  
                                for($i=1;$i<=12;$i++){
                                    echo $bulan[$i].",";
                                }
                             ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Perempuan','Laki-Laki'],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php echo $pr_count.",".$lk_count; ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],

                        }]
                },
                options: {
                  intersect : false,
                  tooltips: {
                      mode: 'dataset',
                  }
                }
            });
        </script>
  </body>
</html>
