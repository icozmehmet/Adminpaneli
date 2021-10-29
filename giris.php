<?php
include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");
ob_start();
session_start();

if (isset($_POST['gonder'])) {
    $kadi = $_POST['k_adi'];
    $sifre = $_POST['sifre'];
}

$kadi = stripcslashes($kadi);
$sifre = stripcslashes($sifre);
$kadi = mysqli_real_escape_string($baglanti, $kadi);
$sifre = mysqli_real_escape_string($baglanti, $sifre);

$sorgu = $baglanti->query("SELECT admin_adi, admin_sifre FROM admingiris");
$cek = $sorgu->fetch_array();
if ($cek['admin_adi'] == $kadi and $cek['admin_sifre'] == $sifre) {
    $_SESSION["login"] = true;
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
    header("Location:urunekle.html");
    echo "İşlem Başarılı!!";
} else {
    if ($kadi == "" or $sifre == "") {
        echo "Kullanıcı adı yada sifre bos olamaz<br>";
    } else
        echo "Kullanıcı adı yada şifre yanlıs<br>";
}