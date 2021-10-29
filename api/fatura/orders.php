<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER["DOCUMENT_ROOT"]. "/admin/data/mail.php";
include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");

$userid = $_GET["id"];
$sorgu = "SELECT fatura_no,urun_adi,urun_maliyeti FROM fatura INNER JOIN urun_giris ON fatura.urun_no = urun_giris.urun_no WHERE musteri_no = $userid ORDER BY fatura_no DESC;";
$sonuclar = mysqli_query($baglanti,$sorgu);
$data = array();
while($row = $sonuclar->fetch_assoc())
{
	$data[] = $row;
}
die(json_encode($data));

