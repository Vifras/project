<?php
ob_start();
include "print_iuran.php";
$content = ob_get_clean();

require_once "includes/html2pdf/html2pdf.class.php";
try{
	$a = new HTML2PDF('P', 'A4', 'fr');
	$a->writeHTML($content, isset($_GET['vuehtml']));
	$a->Output('Rekapitulasi Iuran.pdf');	
}catch(HTML2PDF_exception $e){
	echo $e;
	exit;
}
?>