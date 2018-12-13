<?php

$servername = "localhost";
$dataBUsernamne = "root";
$dataBPassword = "";
$nameOfDataB = "loginsys";

$conn = mysqli_connect($servername, $dataBUsernamne, $dataBPassword, $nameOfDataB);

if (!$conn){
    die("Connection to server failed: " .mysqli_connect_error());
}
?>