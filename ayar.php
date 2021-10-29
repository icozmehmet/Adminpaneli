<?php
$host = "localhost";//"134.122.95.209";
$kadi = "root";
$sifre = "mA592286";
define('veritabani', 'secgetir');

$baglanti = mysqli_connect($host, $kadi, $sifre);
@mysqli_select_db($baglanti, veritabani);
$baglanti->set_charset("utf8mb4");
