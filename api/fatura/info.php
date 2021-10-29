<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");

if(isset($_GET["m_no"])){
    $mno = $_GET["m_no"];
    $uno = $_GET["u_no"];
    $sorgu = "SELECT musteri_adi,urun_adi,urun_resmi,urun_maliyeti from urun_giris 
    INNER JOIN musteri_kayit ON musteri_no = $mno
    WHERE urun_no = $uno;";
    $info = array();
    $info [] = mysqli_query($baglanti,$sorgu)->fetch_assoc();
    die(json_encode($info));

}

$id = $_GET['id'];
$id = $baglanti->escape_string(stripcslashes($id));

$faturasorgu = "SELECT musteri_adi,urun_adi,urun_maliyeti,urun_resmi,urun_turu,fatura.urun_adedi,il,ilce,koy,durum from fatura 
INNER JOIN urun_giris ON fatura.urun_no = urun_giris.urun_no
INNER JOIN musteri_kayit ON fatura.musteri_no = musteri_kayit.musteri_no
WHERE fatura.fatura_no = $id;";


$fatura = mysqli_query($baglanti,$faturasorgu)->fetch_assoc();
die(json_encode($fatura));
