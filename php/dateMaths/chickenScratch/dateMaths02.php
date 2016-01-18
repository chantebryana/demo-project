<!DOCTYPE html>
<html>
    <head>
        <title>Lego v02</title>
        <style> 
        body { background-color: Gray; }
        </style>
    </head>
    
    <body>
        <h1>LEGOS!</h1>
        <p>Build build build.</p>
    <?php
        //source of following: http://stackoverflow.com/questions/676824/how-to-calculate-the-difference-between-two-dates-using-php
        /* dummy code:
        $begDateA = "2014-09-03";
        $endDateA = "2015-11-06";
        $minPerDay = 15.6; 
        $begDate = new DateTime($begDateA);
        $endDate = new DateTime($endDateA);
        $interval = $begDate->diff($endDate);
        $intervalDays = ($interval->days);
        echo($intervalDays . " day interval between " . $begDateA . " and " . $endDateA . "<br>");
        $totalTime = $intervalDays * $minPerDay; //my first decimal = 6692.4 @ 15.6min/day * 429 days
        $minPerDayAvg = $totalTime / $intervalDays; //use this raw number to calculate, then round off end result when printing
        */
        
        //smart code: db lookup!
        $database = mysql_connect('127.0.0.1', 'chantebryana', '') or die('Failed to connect to mysql: ' . mysql_error());
        mysql_select_db('c9') or die('Failed to select database');
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $queryString = "SELECT SUM(minutes) FROM violinTable WHERE date BETWEEN \"$startDate\" and \"$endDate\"";
        $queryString02 = "SELECT count(*) FROM violinTable WHERE date BETWEEN \"$startDate\" and \"$endDate\"";
	    $queryInput = mysql_query($queryString) or die("Query failed: " . mysql_error());
	    $queryInput02 = mysql_query($queryString02) or die("Query failed: " . mysql_error());
        
	    $startInterval = new DateTime($startDate);
	    $endInterval = new DateTime($endDate);
	    $endInterval->modify("+1 day");
	    $interval = $startInterval->diff($endInterval);
	    $intervalDays = ($interval->days);

	    echo "<h2>dateMaths02 Report</h2>";
	    echo "Start Date: " . htmlspecialchars($_POST["startDate"]);
	    echo "<br> End Date: " . htmlspecialchars($_POST["endDate"]);
	    echo "<br>" . $intervalDays . " days selected";
        
        $dbSum = mysql_fetch_array($queryInput)[0];
        /*the line above is shorthand for these two lines below:
        $row = mysql_fetch_array($queryInput);
        $dbSum = $row[0]; */
	    //mysql_free_result($queryInput);

        $intervalAvg = $dbSum / $intervalDays;

        function intervalAvg($var, $int, $str) {
            echo(abs(round(($var * $int / 60)-0.5)) . " hour(s) " . ($var * $int % 60) . " minute(s) $str <br>");
        }
        
        echo("<h3> AVERAGES FOR THIS INTERVAL: </h3>");
        intervalAvg($intervalAvg, 1, "per day");
        intervalAvg($intervalAvg, 7, "per week");
        intervalAvg($intervalAvg, 30.4375, "per month");
        intervalAvg($intervalAvg, 91.25, "per quarter");
        intervalAvg($intervalAvg, 365.25, "per year");
        intervalAvg($intervalAvg, $intervalDays, "total");
        
        echo("<br><a href=\"./dateForm01.html\">Select New Time Interval</a> <br>");
        
        //next 2 lines call on this from beginning: $queryString02 = "SELECT * FROM violinTable WHERE date BETWEEN \"$startDate\" and \"$endDate\"";
        $dbSum02 = count(mysql_fetch_array($queryInput02));
        echo $dbSum02 . "<br>";
        
        echo "<h2>Violin Practice Log</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>" . "ID" . "</th>";
        echo "<th>" . "Date" . "</th>";
        echo "<th>" . "Duration" . "</th>";
        echo "</tr>\n";

        while($dbArray = mysql_fetch_array($queryInput02, MYSQL_ASSOC)){
            foreach($dbArray as $dbElement) {
                echo "<td>" . "$dbElement" . "</td>";
            } 
            echo "</tr>\n";
        }
/*
    while($hoursRecord = mysql_fetch_array($query_results, MYSQL_ASSOC)){
      echo "<tr>";
      foreach($hoursRecord as $hoursCell) {
        echo "<td>" . "$hoursCell" . "</td>";
      }
      echo "</tr>\n";
    }*/

        mysql_free_result($queryInput);
        echo "</table>";
    ?>
    </body>
</html>