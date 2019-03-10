<html>
<head><title>:: Login Petugas ::</title>
<link rel="shortcut icon" href="images/user_img.png" type="image/x-icon" />
<link rel="stylesheet" href="includes/login.css"></link> 
</head>
<body onLoad="document.form.elements['nik'].focus();">
	<form method="POST" action="login_petugas_proses.php">
	<div id="container">
	<h2 align="center">----- Login Petugas -----</h2>
<table cellpadding="2" cellspacing="2">
	<tr>
		<td>NIK</td>
		<td>
		<input type="password" name="nik" onmouseover="javascript: this.type='text';" onmouseout="javascript: this.type='password';" style="width:215px;" value="" required />
		</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>
		<input type="text" name="nama" style="width:215px;" value="" required/>
		</td>
	</tr>
	<tr>
		<td>Tipe</td>
		<td>
			<select style="width:215px;" name="status">
			<option name="rw" value="rw">RW</option>
			<option name="rt" value="rt">RT</option>
			<option name="bendahara" value="bendahara">Bendahara</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td align="right" colspan="2">
		<input type="submit" value="Login" name="login" class="btn-login"/> | 
		<input type="reset" value="Clear" class="btn-login"/> | 
		<a href="../admin/login.php" class="btn-login"> 
		<input type="button" name="login" title="Login Admin" value="Back" class="btn-login" /> </a>
		</td>
	</tr>
	</table>
	<p class="footer">Copyright@2015-2016 | Rekayasa Perangkat Lunak
	</p>
	</div>
	</form>
</body>
</html>