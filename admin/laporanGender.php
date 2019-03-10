<?php
include "includes/libchart/libchart/classes/libchart.php";
include "includes/koneksi.php";

$grafik = new PieChart(500,300);
//$grafik = new LineChart();
//$grafik = new VerticalBarChart();
//$grafik = new HorizontalBarChart();
$grafik->getPlot()->getPalette()->setPieColor(array
	(
		new Color(125,255,75),
		new Color(255,150,200)
	 		));
$dataset	= new XYDataSet();

// $sql = "SELECT count(gender) AS jumlah FROM penduduk WHERE gender = 'L' ";
// $query = mysql_query($sql);
// $result = mysql_fetch_array($query);

// $sql = "SELECT gender FROM penduduk";
// $query = mysql_query($sql);
// $count2 = mysql_fetch_array($query);

$a =mysql_query("SELECT * FROM penduduk WHERE gender = 'P' ");
$jumlah_p = mysql_num_rows($a);
$b =mysql_query("SELECT * FROM penduduk WHERE gender = 'L' ");
$jumlah_l = mysql_num_rows($b);

$dataset->addPoint(new Point('Laki - laki', $jumlah_l));
$dataset->addPoint(new Point('Perempuan', $jumlah_p));

/*$c = mysql_query("SELECT gender FROM penduduk");
$d = mysql_fetch_array($c);
$a =mysql_query("SELECT COUNT(gender) AS jumlah FROM penduduk WHERE gender ='L' ");
while($b = mysql_fetch_array($a)){
	$dataset->addPoint(new Point($c['gender'],$b['jumlah']));
}*/
//$dataset->addPoint(new Point("shampo",2000));
//$dataset->addPoint(new Point("sabun",5000));
//$dataset->addPoint(new Point("odol",1500));
$grafik->setDataSet($dataset);
$grafik->setTitle("Data Gender");
$grafik->render("images/grafik_gender.png");
?>
<img alt="Laporan grafik gender" title="Laporan grafik gender" src="images/grafik_gender.png" style="border: 1px solid gray;"/>
