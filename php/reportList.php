<!DOCTYPE html>
<html>
    <head>
		<title>It's a title!</title>
	<style>
	  body {
	    background-image: url("https://upload.wikimedia.org/wikipedia/commons/8/88/Astronaut-EVA.jpg");
	    background-size: 600px;
	    background-repeat: no-repeat;
	    }
	  table {border-collapse: collapse;}
	  tr:nth-child(even) {background: #CCC}
	  tr:nth-child(odd) {background: #FFF}
	  th, td {border: 1px solid black;}
	</style>
	</head>
	<body>
    <?php
      $database = mysql_connect('127.0.0.1', 'chantebryana', '') or die('Failed to connect to mysql: ' . mysql_error());
      mysql_select_db('c9') or die('Failed to select database');
      $query_string = 'select date, minutes from violinTable order by date desc';
      $query_results = mysql_query($query_string) or die('Query failed: ' . mysql_error());

    echo "<table>";
    echo "<tr>";
    echo "<th>" . "Date" . "</th>";
    echo "<th>" . "Duration" . "</th>";
    echo "</tr>\n";
    
    while($hoursRecord = mysql_fetch_array($query_results, MYSQL_ASSOC)){
      echo "<tr>";
      foreach($hoursRecord as $hoursCell) {
        echo "<td>" . "$hoursCell" . "</td>";
      } 
      echo "</tr>\n";
    }
    mysql_free_result($query_results);
    echo "</table>";
    
    echo "<FORM METHOD = \"link\" ACTION = \"../html/violinForm.html\">";
    echo "<INPUT TYPE = \"submit\" VALUE = \"Add Data\">";
    echo "</FORM>";
    ?>
    </body>
</html>