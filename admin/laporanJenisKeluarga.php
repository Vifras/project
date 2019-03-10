<?php
include "includes/libchart/libchart/classes/libchart.php";
//include "includes/koneksi.php";

//$grafik = new PieChart();
//$grafik = new LineChart();
//$grafik = new VerticalBarChart();
$grafik = new HorizontalBarChart(600, 170);
//$grafik->getPlot()->getPalette()->setPieColor(array(new Color(255,150,200), new Color(125,255,75)));
$grafik->getPlot()->setGraphPadding(new Padding(5, 30, 20, 125));
$dataset	= new XYDataSet();

$a =mysql_query("SELECT * FROM keluarga WHERE id_jenis_keluarga = '1' ");
$jumlah_1 = mysql_num_rows($a);
$b =mysql_query("SELECT * FROM keluarga WHERE id_jenis_keluarga = '2' ");
$jumlah_2 = mysql_num_rows($b);
$c =mysql_query("SELECT * FROM keluarga WHERE id_jenis_keluarga = '3' ");
$jumlah_3 = mysql_num_rows($c);
$d =mysql_query("SELECT * FROM keluarga WHERE id_jenis_keluarga = '4' ");
$jumlah_4 = mysql_num_rows($d);


$dataset->addPoint(new Point('Tetap', $jumlah_1));
$dataset->addPoint(new Point('KK Tidak Berdomisili', $jumlah_2));
$dataset->addPoint(new Point('Kontrak', $jumlah_3));
$dataset->addPoint(new Point('Kost', $jumlah_4));

$grafik->setDataSet($dataset);
$grafik->setTitle("Data Jenis KK");
$grafik->render("images/grafik_jenis_keluarga.png");
?>
<img alt="Laporan grafik jenis keluarga" title="Laporan grafik jenis keluarga" src="images/grafik_jenis_keluarga.png" style="border: 1px solid gray;"/>
