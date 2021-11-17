<?php
session_start();
date_default_timezone_set("Asia/Colombo");


$now=date('H:i:s');

//echo $now."<br>";

$now_time=strtotime($now);
$end_time=strtotime($_SESSION['end_time']);

//echo $_SESSION['end_time']."<br>";

$difference=$end_time-$now_time;


echo  gmdate("H:i:s",$difference);






?>