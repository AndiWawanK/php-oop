<?php
$link = mysqli_connect($host='localhost',$user='root',$pass='',$db='mahasiswa');
session_start();
session_destroy();
header('location: login.php');
 ?>
