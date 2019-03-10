<?php
ob_start();
include "print_surat.php";
$content = ob_get_clean();

require_once "html2pdf/html2pdf.class.php";
try{
	$a = new HTML2PDF('P', 'A4', 'fr');
	$a->writeHTML($content, isset($_GET['vuehtml']));
	$a->Output('cetak_surat.pdf');	
}catch(HTML2PDF_exception $e){
	echo $e;
	exit;
}
?>