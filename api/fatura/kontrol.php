<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER["DOCUMENT_ROOT"]. "/admin/data/mail.php";
include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");

$id = $_GET["id"];
$code = $_GET["code"];

$sorgu = "SELECT COUNT(*) FROM fatura WHERE fatura_no = $id AND verify_kod = $code;";
$result = mysqli_query($baglanti,$sorgu);
if(!$result || $result->num_rows == 0)
    die("Kod Yanlış, Satın Alma İşlemi Başarısız");

$correction = "UPDATE fatura SET verify_kod = NULL WHERE fatura_no = $id";
mysqli_query($baglanti,$correction);
die("Kod doğru, Satın Alma İşlemi Başarılı");