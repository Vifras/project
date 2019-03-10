<?php include "includes/koneksi.php";
$a = mysql_query("SELECT SUM(bayar) AS bayar FROM iuran WHERE id_bulan = '1' ");
$b = mysql_fetch_array($a);
echo  $b['bayar'];
?>