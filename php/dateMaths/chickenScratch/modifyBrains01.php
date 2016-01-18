<!DOCTYPE html>
<html>
    <head>
		<title>Processing!</title>
		<meta http-equiv="refresh" content="1;URL=dateMaths03.php">
	</head>
	<body>
	<?php
	echo htmlspecialchars($_POST["practiceDate"]);
	echo ("<br>");
	echo htmlspecialchars($_POST["practiceDuration"]);
	
	$param1 = $_POST["practiceDate"];
	$param2 = $_POST["practiceDuration"];
	
	//create if else statement: add data or not if blank.
	//if there's data: do the normal steps already typed
	//if no data, don't log in to db, echo statement that it failed, redirect to test.php, etc.
	$database = mysql_connect('127.0.0.1', 'chantebryana', '') or die('Failed to connect to mysql: ' . mysql_error());
    mysql_select_db('c9') or die('Failed to select database');
	$insertString = "INSERT INTO violinTable (date, minutes) VALUES (\"$param1\", \"$param2\")"; 
	$queryInput = mysql_query($insertString) or die("Query failed: " . mysql_error());
	
	//echo ("<a href = \"test.php\">Back to Homepage</a>");
	echo ("Assimilating form data into brain banks. If page doesn't automatically redirect in 1 second click " . "<a href = \"dateMaths03.php\">here</a>" . ".");
	
	//$query_string = 'select date_string, time_string from dates_and_times order by date_string asc';
    //$query_results = mysql_query($query_string) or die('Query failed: ' . mysql_error());
	
	?>	
	</body>
</html>