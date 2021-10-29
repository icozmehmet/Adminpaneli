<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include($_SERVER["DOCUMENT_ROOT"]."/admin/ayar.php");
if(isset($_POST["fatura_no"]) && isset($_POST["durum"]))
{
	$fno = $_POST["fatura_no"];
	$durum = $_POST["durum"];
	
	$sorgu = "UPDATE fatura SET durum = '$durum' WHERE fatura_no= $fno;";
	mysqli_query($baglanti,$sorgu);
	
}
$faturasorgu = "SELECT fatura_no,fatura.urun_no as urunno,urun_adi,il,ilce,koy,durum from fatura 
INNER JOIN urun_giris ON fatura.urun_no = urun_giris.urun_no;";

$faturalar = mysqli_query($baglanti,$faturasorgu);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siparişler</title>
    <link rel="stylesheet" href="/admin/menu.css">
    <style>
        table,th,td{
            border:1px solid black;
        }
    </style>
</head>
<body>
    
	<div class="topnav">
		<a href="urunekle.html">Ürün Ekle</a>
		<a href="urunsil.html">Ürün Sil</a>
		<a href="urunguncelle.html">Ürün Güncelle</a>
		<a href="fatura.php" class="active">Fatura</a>
	</div>
    <table>
        <thead>
            <tr>
                <td>Fatura No</td>
                <td>Ürün Adı</td>
                <td>Adres</td>
                <td>Durum</td>
            </tr>
        </thead>
        <tbody>
            <?php while($fatura = $faturalar->fetch_assoc()){ 
                ?>

                <tr>
                    <td><?=$fatura["fatura_no"]?></td>
                    <td><?=$fatura["urun_adi"]?></td>
                    <td><?=$fatura["il"]. " ". $fatura["ilce"] . " " . $fatura["koy"]?></td>
                    <td>
                        <form action="/admin/fatura.php" method="post">
                            <input type="text" name="durum" value="<?=$fatura["durum"]?>">
                            <input type="hidden" name="fatura_no" value="<?=$fatura["fatura_no"]?>">
                            <input type="submit" value="Değiştir">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>