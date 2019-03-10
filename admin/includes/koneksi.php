<?php
$host = "localhost";
$user = "root";
$pass = "";
$db	  = "UKK";

mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db($db) or die (mysql_error());

function report_date($Tgl){
	$Year       = substr($Tgl, 0, 4);
	$Month      = substr($Tgl, 5, 2);
	$Date       = substr($Tgl, 8, 2);

	switch($Month){
		case "01" :
			$Month = "Januari";
			break;

		case "02" :
			$Month = "Februari";
			break;

		case "03" :
			$Month = "Maret";
			break;

		case "04" :
			$Month = "April";
			break;

		case "05" :
			$Month = "Mei";
			break;

		case "06" :
			$Month = "Juni";
			break;

		case "07" :
			$Month = "Juli";
			break;

		case "08" :
			$Month = "Agustus";
			break;

		case "09" :
			$Month = "September";
			break;

		case "10" :
			$Month = "Oktober";
			break;

		case "11" :
			$Month = "November";
			break;

		case "12" :
			$Month = "Desember";
			break;
	}

	$Tanggal    = $Date." ".$Month." ".$Year;

	return($Tanggal);

}
function ExplodeDate($Tgl){
	$ArrayTanggal = explode("/",$Tgl);
	$Tanggal      = $ArrayTanggal[2]."-".$ArrayTanggal[1]."-".$ArrayTanggal[0]." 000000";

	return($Tanggal);
}
function ImplodeDate($Tgl){
	$pos = strpos($Tgl,'/');

	if ($pos === false){
		$Year       = substr($Tgl, 0, 4);
		$Month      = substr($Tgl, 5, 2);
		$Date       = substr($Tgl, 8, 2);

		$Tanggal    = $Date."/".$Month."/".$Year;
	}
	else{
		$Tanggal    = $Tgl;
	}
	if ($Tanggal == '//'){
		$Tanggal = '';
	}

	return($Tanggal);
}
?>