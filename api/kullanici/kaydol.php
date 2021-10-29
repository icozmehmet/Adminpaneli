<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");

$kullanici_adi = $_GET["kadi"];
$sifre = $_GET["sifre"];
$ad = $_GET["ad"];
$email = $_GET["email"];

if(isset($_GET["userid"]))
{ 
    $mno = $_GET["userid"];
    $sorgu = "UPDATE musteri_kayit SET 
    musteri_kadi = '$kullanici_adi',
    musteri_sifre = '$sifre',
    musteri_adi = '$ad',
    musteri_mail = '$email'
    WHERE musteri_no = $mno;";
}
else {
    $sorgu = "INSERT INTO musteri_kayit(
        musteri_kadi,
        musteri_sifre,
        musteri_adi,
        musteri_mail)
        VALUES(
        '$kullanici_adi',
        '$sifre',
        '$ad',
        '$email');";
}

if(!mysqli_query($baglanti,$sorgu))
    echo mysqli_error($baglanti);