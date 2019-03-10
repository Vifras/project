<style type="text/css">
	p{
		font-size: 12px;
		/*text-indent: 20px;*/
		font-family: arial;
	}
	h1{
		margin-top: -5px;
	}
	hr{
		border-style: dotted;
	}
</style>
<?php
session_start(); 
echo "<h1>Tutorial mencetak surat pengantar</h1><hr/>";
echo "<p>Berikut di bawah ini cara mencetak surat dengan gambar :</p>
<ol>
	<li>Setelah selesai mengisi formulir dengan lengkap dan benar, akan muncul tab baru dengan nama cetak.php</li>
	<center><img src='images/1.png' width='350' /></center>
	<li>Klik tab tersebut lalu muncul tampilan seperti di bawah ini</li>
	<center><img src='images/2.png' width='250' /></center>
	<li>Jika ingin mencetak surat klik ikon nomer 1, sedangkan jika ingin men-download surat klik ikon nomer 2 </li>
	<center><img src='images/3.png' width='250' /></center>
	<li>Sekian, Terima kasih telah berkunjung,<b> ".$_SESSION['kepkel']."</b></li>
</ol>
";
?>
