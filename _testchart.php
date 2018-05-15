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

echo $pr_count;
echo "<br>";
echo $lk_count;
echo "<br>";
echo $bulan[8];


?>
<html>
    <head>
        <title>Belajarphp.net - ChartJS</title>
        <script src="js/Chart.bundle.js"></script>
 
        <style type="text/css">
            .container {
                width: 60vh;
                height: auto;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container-chart">
            <canvas id="myChart1" width="100" height="100"></canvas>
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
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
                    labels: ['Laki-Laki','perempuan'],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php echo $lk_count.",".$pr_count; ?>],
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

                }
            });
        </script>
    </body>
</html>