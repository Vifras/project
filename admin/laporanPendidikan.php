<?php
include "includes/libchart/libchart/classes/libchart.php";
//include "includes/koneksi.php";

$grafik = new PieChart(500,300);
//$grafik = new LineChart();
//$grafik = new VerticalBarChart();
//$grafik = new HorizontalBarChart();
//$grafik->getPlot()->getPalette()->setPieColor(array(new Color(255,150,200), new Color(125,255,75)));
$dataset	= new XYDataSet();

$a =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '1' ");
$jumlah_1 = mysql_num_rows($a);
$b =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '2' ");
$jumlah_2 = mysql_num_rows($b);
$c =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '3' ");
$jumlah_3 = mysql_num_rows($c);
$d =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '4' ");
$jumlah_4 = mysql_num_rows($d);
$e =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '5' ");
$jumlah_5 = mysql_num_rows($e);
$f =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '6' ");
$jumlah_6 = mysql_num_rows($f);
$g =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '7' ");
$jumlah_7 = mysql_num_rows($g);
$h =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '8' ");
$jumlah_8 = mysql_num_rows($h);
$i =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '9' ");
$jumlah_9 = mysql_num_rows($i);
$j =mysql_query("SELECT * FROM penduduk WHERE id_pendidikan = '10' ");
$jumlah_10 = mysql_num_rows($j);

$dataset->addPoint(new Point('Tidak/Belum Sekolah', $jumlah_1));
$dataset->addPoint(new Point('Tidak Tamat SD/Sederajat', $jumlah_2));
$dataset->addPoint(new Point('Tamat SD/Sederajat', $jumlah_3));
$dataset->addPoint(new Point('SLTP/Sederajat', $jumlah_4));
$dataset->addPoint(new Point('SLTA/Sederajat', $jumlah_5));
$dataset->addPoint(new Point('Diploma I/II', $jumlah_6));
$dataset->addPoint(new Point('Akademi/Diploma III/S. Muda', $jumlah_7));
$dataset->addPoint(new Point('Diploma IV/Strata I', $jumlah_8));
$dataset->addPoint(new Point('Strata II', $jumlah_9));
$dataset->addPoint(new Point('Strata III', $jumlah_10));

$grafik->setDataSet($dataset);
$grafik->setTitle("Data Pendidikan");
$grafik->render("images/grafik_pendidikan.png");
?>
<img alt="Laporan grafik pendidikan" title="Laporan grafik pendidikan" src="images/grafik_pendidikan.png" style="border: 1px solid gray;" />
