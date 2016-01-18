<!DOCTYPE html>
<html>
    <head>
		<title>It's a title!</title>
	</head>
	<body>
    <?php
      $database = mysql_connect('127.0.0.1', 'chantebryana', '') or die('Failed to connect to mysql: ' . mysql_error());
      mysql_select_db('c9') or die('Failed to select database');
      $query_string = 'select date_string, time_string from dates_and_times order by date_string asc';
      $query_results = mysql_query($query_string) or die('Query failed: ' . mysql_error());
  /*    
  $violinHours = array
    (
      array("Jan 3","30 min"),
      array("Jan 4","35 min"),
      array("Jan 5","25 min"),
      array("Jan 6","45 min")
    );
    */
    echo "<table>";
    echo "<tr>";
    echo "<th>" . "Date" . "</th>";
    echo "<th>" . "Duration" . "</th>";
    echo "</tr>\n";
    
    //foreach($violinHours as $hoursRecord) {
    while($hoursRecord = mysql_fetch_array($query_results, MYSQL_ASSOC)){
      echo "<tr>";
      foreach($hoursRecord as $hoursCell) {
        echo "<td>" . "$hoursCell" . "</td>";
      } 
      echo "</tr>\n";
    }
    mysql_free_result($query_results);
    echo "</table>";
    
    //echo "<button type=\"button\">Add Data</button>";
    //echo "<FORM METHOD = \"link\" ACTION = \"http://data.whicdn.com/images/27914139/4690100_large.jpg\">";
    echo "<FORM METHOD = \"link\" ACTION = \"../html/newForm.html\">";
    echo "<INPUT TYPE = \"submit\" VALUE = \"Add Data\">";
    echo "</FORM>";

    //echo "<pre><code>" . htmlspecialchars(ob_get_contents()) . "</code></pre>";
    
    //to begin mysql server in bash: mysql-ctl start
    //to begin mysql client: mysql -h 127.0.0.1 -u chantebryana c9

    ?>
    </body>
</html>