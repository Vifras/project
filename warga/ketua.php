<style type="text/css">
	#img{
		border-radius: 100px;
		width: 150px;
		height: 150px;
		border:10px groove blue;
	}
</style>
<?php 
	$a = mysql_query("SELECT A.nik_rt, A.foto, B.rw, A.rt, A.nama, A.alamat 
	FROM rt As A 
		INNER JOIN rw As B 
			ON ( A.nik_rw = B.nik_rw ) ");
	$b = mysql_fetch_array($a);
	echo "<center><img id='img' src='admin/$b[foto]'/>
	<img src='images/ketua.png' style='margin-top:-5px;' width='200'/>
	</center>";
	echo "<p style='text-align:center; margin-top:5px; padding:0px;'>
		Ketua RT $b[rt] / RW $b[rw]<br/>
		Bapak $b[nama]<br/>
		$b[alamat]
		</p>"
?>