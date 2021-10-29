<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER["DOCUMENT_ROOT"]. "/admin/data/mail.php";
include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");

$email = $_GET["email"];
$email = mysqli_real_escape_string($baglanti, $email);


$query = "SELECT musteri_sifre from musteri_kayit WHERE musteri_mail = '$email'";
$cevap = mysqli_query($baglanti,$query)->fetch_array();
if(null==$cevap)
    die("Böyle bir mail yok");
$sifre = $cevap["musteri_sifre"];
sendMail($email,"SecGetir Şifremi Unuttum","Şifrenizi unuttuğunuz için bu maili aldınız. Şifreniz: $sifre");
