<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER["DOCUMENT_ROOT"]. "/admin/data/mail.php";
include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");

$u_no = $_GET['u_no'];
$m_no = $_GET['m_no'];
$m_il = $_GET['il'];
$m_ilce = $_GET['ilce'];
$m_koy = $_GET['koy'];
$kartno = $_GET['kart_no'];
$email = $_GET['email'];
$u_adedi = $_GET['u_adedi'];
$_durum=$_GET['u_durum'];
$d_ekle = ("INSERT INTO fatura (durum) VALUES('$_durum');");

$sonuc = mysqli_query($baglanti, $d_ekle);

$musterisorgu = "UPDATE musteri_kayit SET musteri_mail = '$email' WHERE musteri_no = $m_no";
mysqli_query($baglanti,$musterisorgu);

$u_no = $baglanti->escape_string(stripcslashes($u_no));
$m_no = $baglanti->escape_string(stripcslashes($m_no));
$m_il = $baglanti->escape_string(stripcslashes($m_il));
$m_ilce = $baglanti->escape_string(stripcslashes($m_ilce));
$m_koy = $baglanti->escape_string(stripcslashes($m_koy));
$email = $baglanti->escape_string(stripcslashes($email));
$u_adedi = $baglanti->escape_string(stripcslashes($u_adedi));
$kartno = $baglanti->escape_string(stripcslashes($kartno));

$code = rand(1111,9999);

$sorgu = "INSERT INTO fatura(urun_no,urun_adedi,musteri_no,il,ilce,koy,kart_no,verify_kod) VALUES ($u_no,$u_adedi,$m_no,'$m_il','$m_ilce','$m_koy','$kartno',$code)";
mysqli_query($baglanti,$sorgu);

sendMail($email,"Fatura Doğrulama","Alışverişinizi doğrulamak için kullanmanız gereken kod: $code");

echo mysqli_insert_id($baglanti);


