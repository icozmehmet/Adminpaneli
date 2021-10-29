<?php    
		include("ayar.php");
		var_dump($_POST);
		if(isset($_POST['guncelle'])){
		  $_uisim=$_POST['u_ad'];
		  $urunno=$_POST['u_no'];
		  $_umaliyet=$_POST['u_maliyet'];
		  $_uadedi=$_POST['u_adedi'];
		  $baglanti->set_charset("utf8mb4");
		
		  $sorgu="UPDATE urun_giris SET urun_adi='$_uisim',urun_maliyeti=$_umaliyet,urun_adedi=$_uadedi 
		  WHERE urun_no=$urunno";
			$sonuc=mysqli_query($baglanti,$sorgu);
		if($sonuc){
			echo $baglanti->affected_rows."Kayıt Güncellendi!!";
		}
		else
			echo "Herhangi Bir Kayıt Guncellenmedi".$baglanti->error;
		}
?>