<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("ayar.php");
if (!isset($_POST['kaydet']))
	exit; //404 falan verdiriceksen de lazım olur

$_uisim = $_POST['u_ad'];
$urunno = $_POST['u_no'];
$_secim = $_POST['secim'];
$_umaliyet = $_POST['u_maliyet'];
$_utarih = $_POST['u_tarihi'];
$_uadedi = $_POST['u_adedi'];
$resimismi = $_POST['resim_ismi'];
$yuklenecek_dosya = "/admin/images/".basename($_FILES['img']['tmp_name']);

if (move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$yuklenecek_dosya)) {
	echo "<img src='$yuklenecek_dosya' width='100'><br>";
	echo "Dosya başarıyla yüklendi.<br>";
} else {
	echo "Dosya yüklenemedi! <br>";
	exit;
}
echo "Ürün Adı= $_uisim , Ürün Adedi= $_uadedi , Dosya: $yuklenecek_dosya Türü: $_secim, 
		Tarih: $_utarih <br>";

$ekle = ("INSERT INTO urun_giris (
	urun_no,
	urun_adi,
	resim_yazisi,
	urun_resmi,
	urun_turu,
	urun_maliyeti,
	urun_adedi,
	urun_giris_tarihi
  ) 
VALUES($urunno,
	  '$_uisim',
 	  '$resimismi',
	  '$yuklenecek_dosya',
	  '$_secim',
	   $_umaliyet,
       $_uadedi,
	  '$_utarih'
	  );");
$sonuc = mysqli_query($baglanti, $ekle);
if ($sonuc)

	echo "Ürün Eklendi!!";

else
	echo mysqli_error($baglanti);
