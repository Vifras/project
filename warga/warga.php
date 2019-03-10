<style type="text/css">
	table{
		padding: 3px;
		border-collapse: collapse;

	}
</style>
<?php
session_start(); 
$a = mysql_query("SELECT * FROM profil");
$b = mysql_fetch_array($a);

//echo "Selamat datang di website kampung <b>$b[alamat]</b><br/><hr/>";
echo "&nbsp;&nbsp;&nbsp;Menu tambahan yang tersedia untuk warga kampung :  <br/>
	&nbsp;&nbsp;&nbsp;1.<a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=lap_iuran';\"> Laporan iuran kampung</a><br/>
	&nbsp;&nbsp;&nbsp;2.<a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=surat';\"> Buat surat pengantar</a><br/>
	&nbsp;&nbsp;&nbsp;3.<a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=tutorial';\"> Tutorial mencetak surat pengantar</a><br/>
	&nbsp;&nbsp;&nbsp;4.<a style='cursor:pointer;' target='' onclick=\"javascript: window.open('warga/kk_cetak.php', '_blank');\"> Lihat Kartu Keluarga</a><br/>
	&nbsp;&nbsp;&nbsp;5.<a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=iuran';\"> Lihat Kartu Iuran</a><hr/>
	";


echo "Berikut profil data KK anda &raquo;&raquo; </br></br>";
echo "<table>";
echo "<tr>";
echo "<td> No. KK  </td><td>:</td><td><b>".$_SESSION['nokk']."</b></td>";
echo "</tr>";
echo "<tr>";
echo "<td> Nama  </td><td>:</td><td><b>".$_SESSION['kepkel']."</b></td>";
echo "</tr>";
echo "<tr>";
echo "<td width='75'> Jenis KK  </td><td>:</td><td><b>".$_SESSION['jenis']."</b></td>";
echo "</tr>";
echo "<tr>";
echo "<td> Alamat  </td><td>:</td><td><b>".$_SESSION['alamat']."</b></td>";
echo "</tr>";
echo "</table><br>";
echo "&nbsp;<a class='logout' style='cursor:pointer;' onclick=\"javascript: if(confirm('Yakin mau Keluar ?')==true){window.location.href='warga/logout.php';}\"><img src='images/exit.png' style='margin-bottom:-7px;' width='25' height='25' /><b>&nbsp;Keluar </b></a>"
?>