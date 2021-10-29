<?php
include("../../ayar.php");
ob_start();
session_start();
$extension = "";
if(isset($_GET["u_id"])){
    $u_id = $baglanti->real_escape_string($_GET["u_id"]);
    $extension = "WHERE urun_no = $u_id";
}
$query = $baglanti->query("SELECT * FROM urun_giris $extension;");
$data = array();
while($row = $query->fetch_assoc())
{
	$data[] = $row;
}
die(json_encode($data));
