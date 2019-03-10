<style type="text/css">
	p{
		margin-top: -3px;
	} 
</style>

<?php 
	$jumlah = mysql_query("SELECT * FROM kegiatan");
	$total = mysql_num_rows($jumlah);
	$data = 3;

		if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
			$start = 0;
		}
	//echo "SELECT * FROM kegiatan ORDER BY tanggal_kegiatan ASC LIMIT $start, $data";
	$waktu = mysql_query("SELECT * FROM kegiatan");
	$pecah =
	$a = mysql_query("SELECT * FROM kegiatan ORDER BY tanggal_kegiatan desc LIMIT 0, 3");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<center><b>Belum ada data</b>";
	}else{
	while($b=mysql_fetch_array($a)){
		$date = date("Y-m-d");
		$data_date=$b['tanggal_kegiatan'];
		$tgl_ind=report_date($data_date);
		$jangka_waktu = strtotime('+1 days', strtotime($data_date));// jangka waktu + 365 hari
		$tgl_exp=date("Y-m-d",$jangka_waktu);//tanggal expired
		if($date >= $tgl_exp ){
			echo "<ul>";
			echo "<li><h4>$tgl_ind</h4></li>";
			echo "<p style='text-indent:-3px;'><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=kegiatan_proses&id=$b[id_kegiatan]';\">$b[perihal]<i style='color:red;'> ~ OLD !!! </i></a><p>";
			echo "</ul>";
		}else{
		echo "<ul>";
		echo "<li><h4>$tgl_ind</h4></li>";
		echo "<p style='text-indent:-3px;'><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=kegiatan_proses&id=$b[id_kegiatan]';\">$b[perihal]<i style='color:red;'> ~ NEW !!! </i></a><p>";
		echo "</ul>";
		}
	}
}
	?>