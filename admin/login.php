<html>
<head><title>:: Login Admin ::</title>
<link rel="shortcut icon" href="images/user_img.png" type="image/x-icon" />
<link rel="stylesheet" href="includes/login.css"></link> 
</head>
<body onLoad="document.form.elements['username'].focus();">
<body>
	<form method="POST" action="login_proses.php">
	<div id="container">
	<h2 align="center">----- Login Admin -----</h2>
<table cellpadding="2" cellspacing="2">
	<tr>
		<td align="center">Username</td>
		<td>
		<input type="text" name="username" style="width:190px;" value="" required/>
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
		<input type="password" name="password" onmouseover="javascript: this.type='text';" onmouseout="javascript: this.type='password';" style="width:190px;" value="" required />
		</td>
	</tr>	
	<tr>
		
		</td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td align="right" colspan="2">
		<input type="submit" value="Login" class="btn-login"/> | 
		<input type="reset" value="Clear" class="btn-login"/> | 
		<a href="../petugas/login_petugas.php" class="btn-login"> 
		<input type="button" title="Login Petugas" value="Back" class="btn-login" /> </a>
		</td>
	</tr>
	</table>
	<p class="footer">Copyright@2015-2016 | Rekayasa Perangkat Lunak
	</p>
	</div>
	</form>
</body>
</html>