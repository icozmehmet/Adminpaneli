<?php     
	include("ayar.php");
	if(isset( $_POST['del']));{
		  	$_uisim=$_POST['u_ad'];
		  	$urunno=$_POST['u_no'];
			$baglanti->set_charset("utf8mb4");
			
			$del=("DELETE FROM urun_giris WHERE urun_no='$urunno' AND urun_adi='$_uisim'" );
			
			$sonuc=mysqli_query($baglanti,$del);
			
			if($sonuc){
				echo " $_uisim Adlı Ürün Silinmiştir!!!";
			}
			else
				echo "Ürün İsimi Yada Ürün No Yanlış!!";
		  }
?>