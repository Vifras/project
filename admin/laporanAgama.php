<?php
include "includes/libchart/libchart/classes/libchart.php";
//include "includes/koneksi.php";

//$grafik = new PieChart();
$grafik = new LineChart();
//$grafik = new VerticalBarChart();
//$grafik = new HorizontalBarChart();
//$grafik->getPlot()->getPalette()->setPieColor(array(new Color(255,150,200), new Color(125,255,75)));
$grafik->getPlot()->setGraphPadding(new Padding(5, 30, 55, 50));
$dataset	= new XYDataSet();

$a =mysql_query("SELECT * FROM penduduk WHERE id_agama = '1' ");
$jumlah_1 = mysql_num_rows($a);
$b =mysql_query("SELECT * FROM penduduk WHERE id_agama = '2' ");
$jumlah_2 = mysql_num_rows($b);
$c =mysql_query("SELECT * FROM penduduk WHERE id_agama = '4' ");
$jumlah_4 = mysql_num_rows($c);
$d =mysql_query("SELECT * FROM penduduk WHERE id_agama = '5' ");
$jumlah_5 = mysql_num_rows($d);
$e =mysql_query("SELECT * FROM penduduk WHERE id_agama = '6' ");
$jumlah_6 = mysql_num_rows($e);
$f =mysql_query("SELECT * FROM penduduk WHERE id_agama = '7' ");
$jumlah_7 = mysql_num_rows($f);

$dataset->addPoint(new Point('Islam', $jumlah_2));
$dataset->addPoint(new Point('Hindu', $jumlah_1));
$dataset->addPoint(new Point('Budha', $jumlah_5));
$dataset->addPoint(new Point('Kong Hu Cou', $jumlah_7));
$dataset->addPoint(new Point('Kristen', $jumlah_4));
$dataset->addPoint(new Point('Katolik', $jumlah_6));


$grafik->setDataSet($dataset);
$grafik->setTitle("Data Agama");
$grafik->render("images/grafik_agama.png");
?>
<img alt="Laporan grafik agama" title="Laporan grafik agama" src="images/grafik_agama.png" style="border: 1px solid gray;"/>
