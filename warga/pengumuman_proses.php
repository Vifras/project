<style type="text/css">
	hr{
		border-style: dotted;
	}
	h1{
		margin-top: -5px;
		font-family: halvetica;
		color:blue;
	}
	p{
		font-size: 12px;
	}
</style>
<?php
$id = $_GET['id'];
$sql_news = "SELECT * FROM pengumuman WHERE id_pengumuman='$id'";
$qry_news = mysql_query($sql_news);
$data_news=mysql_fetch_array($qry_news);
$data_judul =$data_news['judul'];
$data_pengumuman=$data_news['pengumuman'];
$data_pengirim=$data_news['pengirim'];
$data_date=$data_news['date'];
//$tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)."-".substr($data_date,0,4);
$tgl_ind=report_date($data_date);
		echo("<h1> $data_judul </h1><hr/>
			<table width='100%'>
			<tr> 
				<td>
					$data_pengumuman
					Posted by : <b>$data_pengirim</b> |
					Tanggal : <b>$tgl_ind</b> 
				</td>
			</tr>
			</table>
			<a style='cursor:pointer;' border='0' onclick=\"javascript:window.location.href='index.php?page=pengumuman';\"><img src='images/fancy_nav_left.png' title='Kembali ke daftar pengumuman' alt='Kembali' width='30' height='30' border='0' /></a>");
?>