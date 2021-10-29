<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");

$id = $_GET["userid"];

$sorgu = "SELECT musteri_adi, musteri_kadi,musteri_sifre,musteri_mail from musteri_kayit
WHERE musteri_no = $id;";

$cevap = mysqli_query($baglanti,$sorgu)->fetch_assoc();

if($cevap == null)
    die("Bu id'de kullanıcı yok. Sistem admini ile iletisime geciniz.");
die(json_encode($cevap));