<!DOCTYPE html>
<html>
    <head>
		<title>Brains Activate</title>
		<style>
	  		body {
	    		background-image: url("http://grin.hq.nasa.gov/IMAGES/SMALL/GPN-2000-001156.jpg");
	    		background-size: 600px;
	    		background-repeat: no-repeat;
	    	}
		</style>
	</head>
	<body text="grey">
	<?php

	//source for query lookup: http://www.phpsuperblog.com/php/display-data-from-mysql-database-with-html-form-and-php/
	
	$database = mysql_connect('127.0.0.1', 'chantebryana', '') or die('Failed to connect to mysql: ' . mysql_error());
    mysql_select_db('c9') or die('Failed to select database');
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $queryString = "SELECT SUM(minutes) FROM violinTable WHERE date BETWEEN \"$startDate\" and \"$endDate\"";
	$queryInput = mysql_query($queryString) or die("Query failed: " . mysql_error());
    
	echo "<h2> Status Report! </h2>";
	echo "Start Date: " . htmlspecialchars($_POST["startDate"]);
	echo ("<br>");
	echo "End Date: " . htmlspecialchars($_POST["endDate"]);
	echo ("<br>");
    
    while ($row = mysql_fetch_array($queryInput)){
        echo "Total Minutes Practiced: " . $row[0];
    }
	mysql_free_result($queryInput);
	
	echo "<br>";
	echo "<a href=\"../html/reportForm.html\">Run another report</a><br>";
	echo "<a href=\"../html/violinForm.html\">Add new data</a><br>";
	?>	
	</body>
</html>