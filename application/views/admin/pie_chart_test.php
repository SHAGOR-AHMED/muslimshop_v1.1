<?php
	
	include "application/libraries/libchart/classes/libchart.php";

	$chart = new PieChart();

	$dataSet = new XYDataSet();
	foreach($product_info as $v_product){

        $dataSet->addPoint(new Point("$v_product->prod_name ($v_product->prod_price)", $v_product->prod_price));
    }	
	
	$chart->setDataSet($dataSet);

	$chart->setTitle("User agents for www.example.com");
	$chart->render("assets/img/report/pie_chart.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart pie chart demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
    <img alt="Pie chart"  src="<?php echo base_url();?>assets/img/report/pie_chart.png" style="border: 1px solid gray;"/>
</body>
</html>
