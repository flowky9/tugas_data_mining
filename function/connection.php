<?php 


$connect = mysqli_connect("localhost","root","","datamining") OR die('gagal koneksi');


$connect_clean = mysqli_connect("localhost","root","","datamining_clean") OR die('gagal koneksi');

$umur = rand(2,50);
$query = mysqli_query($connect,"UPDATE umur SET umur=");


 ?>