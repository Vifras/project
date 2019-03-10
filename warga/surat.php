<?php
	session_start();
	$_SESSION['nokk'];
?>
<style type="text/css">
	hr{
		border-style: dotted;
	}
	h1{
		margin-top: -5px;
		font-family: halvetica;
	}
	p{
		font-size: 12px;
	}
</style>
<script type="text/javascript" src="admin/includes/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
    tinymce.init({
    	selector:'textarea',
    	theme: "simple",
    	width:375,
    	height:125,
    	menubar:false,
    	resize:false,
    	statusbar:false
});
</script>
<h1>Formulir Surat Pengantar</h1>
<hr />
<form method="POST" action="index.php?page=surat_proses&aksi=tambah">
<input type="hidden" name="idx" value="<?php echo $_SESSION[nokk] ?>">
<?php
	$a = mysql_query("SELECT * FROM penduduk WHERE no_kk = '".$_SESSION['nokk']."' ");
	$b = mysql_fetch_array($a);
echo "&nbsp;&nbsp;&nbsp;Silahkan isi formulir berikut di bawah ini sesuai dengan data yang berkepentingan : <br/><br/>";
echo "<label> NIK : </label><br>";
echo "<span id='span'></span>";
echo "&nbsp;&nbsp;&nbsp;<select name='cbnik' style='width:85%;' onchange=\"javascript: $('#span').load('warga/surat_proses.php?aksi=jumlah&id='+this.value); \" >";
echo"<option value=''></option>";
				$kat = mysql_query("SELECT * FROM penduduk WHERE no_kk ='".$_SESSION['nokk']."' ");
				while($hasil_kat = mysql_fetch_array($kat)){
echo "<option value='$hasil_kat[nik]'>$hasil_kat[nik]</option>";}
echo "</select>
	<br/>";
echo "<label> Nama Lengkap : </label><br/>
	<input type='text' name='nama' id='nama' placeholder='Masukkan Nama...' /><br/>";
echo "<label> Alamat : </label><br/><input type='text' name='alamat' id='alamat' placeholder='Masukkan Alamat...'  /><br/>";
echo "<label> Pekerjaan : </label><br/><input type='text' name='pekerjaan' id='pekerjaan' placeholder='Masukkan Pekerjaan...'  /><br/>";
echo "<label> Jenis Kelamin : </label><br/>
	<input type='radio' name='gender' id='genderL' value='Laki-laki' checked /> Laki-laki
	<input type='radio' name='gender' id='genderP' value='Perempuan' /> Perempuan <br/><br/>";
echo "<label> Tempat / tgl. lahir : </label><br/><input type='text' name='tempat' id='tempat' placeholder='Masukkan Tempat lahir...'  /><input type='text' name='tanggal' id='tanggal' placeholder='Masukkan Tanggal lahir...'  /><img src='includes/popup-calendar/calendar.gif' width='24' height='12' onclick=\"displayCalendar(document.getElementById('tanggal'),'yyyy/mm/dd',this)\" style='cursor:pointer'><br/>";
echo "<label> Agama : </label><br/><input type='text' name='agama' id='agama' placeholder='Masukkan Agama...'  /><br/>";
echo "<label> Kawin / tidak kawin : </label><br/><input type='text' name='kawin' id='kawin' placeholder='Masukkan Hubungan...'  /><br/>";
echo "<label> Kewarnegaraan : </label><br/>
	<input type='radio' name='kewar' value='WNI' required checked/>WNI
	<input type='radio' name='kewar' value='WNA' required/>WNA<br/><br/>";
echo "<label> Keperluan / Kepentingan : </label><br/>
	<textarea  placeholder='Masukkan Keperluan...' name='keperluan' id='keperluan' ></textarea><br/>";
echo "<input type='submit' value='BUAT' />
	<input type='reset' value='RESET' />";
?>
</form>