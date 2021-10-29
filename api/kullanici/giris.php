<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include($_SERVER["DOCUMENT_ROOT"] . "/admin/ayar.php");
ob_start();
session_start();


$kadi = $_GET['k_adi'];
$sifre = $_GET['sifre'];


$kadi = stripcslashes($kadi);
$sifre = stripcslashes($sifre);
$kadi = mysqli_real_escape_string($baglanti, $kadi);
$sifre = mysqli_real_escape_string($baglanti, $sifre);

$sorgu = $baglanti->query("SELECT musteri_no FROM musteri_kayit
WHERE musteri_kadi = '$kadi' AND musteri_sifre = '$sifre';");
$cek = $sorgu->fetch_array();
if ($cek != null) {
    $_SESSION["login"] = true;
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
    echo $cek['musteri_no'];
} 
else {
    if ($kadi == "" or $sifre == "") {
        echo "Kullanıcı adı yada sifre bos olamaz<br>";
    } else
        echo "Kullanıcı adı yada şifre yanlıs<br>";
}
