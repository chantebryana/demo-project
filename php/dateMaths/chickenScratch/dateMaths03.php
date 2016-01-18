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
        
        $database = mysql_connect('127.0.0.1', 'chantebryana', '') or die('Failed to connect to mysql: ' . mysql_error());
        mysql_select_db('c9') or die('Failed to select database');
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $queryString = "SELECT SUM(minutes) FROM violinTable WHERE date BETWEEN \"$startDate\" and \"$endDate\"";
        $queryString02 = "SELECT count(DISTINCT date) FROM violinTable WHERE date BETWEEN \"$startDate\" and \"$endDate\"";
        $queryString03 = "SELECT SUM(minutes) FROM violinTable";
	    $queryInput = mysql_query($queryString) or die("Query failed: " . mysql_error());
	    $queryInput02 = mysql_query($queryString02) or die("Query failed: " . mysql_error());
	    $queryInput03 = mysql_query($queryString03) or die("Query failed: " . mysql_error());
        
        $dbSum = mysql_fetch_array($queryInput)[0];
        $dbSum02 = mysql_fetch_array($queryInput02)[0];
        $dbSum03 = mysql_fetch_array($queryInput03)[0];
        
	    //Define your intervalz
	    $startInterval = new DateTime($startDate);
	    $endInterval = new DateTime($endDate);
	    $endInterval->modify("+1 day");
	    $interval = $startInterval->diff($endInterval);
	    $intervalDays = ($interval->days);
        
        //function that computes percentages!
        function percentFunc($minSum, $minGoal) {
            $minDecimal = $minSum / $minGoal;
            $minPercent = (number_format($minDecimal, 2, ".", ",")*100);
            return $minPercent;
        }
        
        echo("<p><a href=\"./dateForm01.html\">Select New Time Interval</a> </p>");
        echo("<p><a href=\"./modifyForm01.html\">Add/Modify/Delete Practice Time</a></p>");
        
	    echo "<h2>dateMaths03 Report</h2>";
	    echo "Start Date: " . htmlspecialchars($_POST["startDate"]);
	    echo "<br> End Date: " . htmlspecialchars($_POST["endDate"]);
	    echo "<br>" . $intervalDays . " days selected";
	    echo "<br> $dbSum02 days practiced";
	    echo("<br>You've practiced about " . percentFunc($dbSum02, $intervalDays) . "% of the time during this time interval.");
	    
        //interval-avg definitions and function
        $intervalAvg = $dbSum / $intervalDays;
        function intervalAvg($var, $int, $str) {
            echo(abs(round(($var * $int / 60)-0.5)) . " hr " . ($var * $int % 60) . " min $str <br>");
        }
        
        echo("<h3> AVERAGES FOR THIS INTERVAL: </h3>");
        intervalAvg($intervalAvg, 1, "per day");
        intervalAvg($intervalAvg, 7, "per week");
        intervalAvg($intervalAvg, 30.4375, "per month");
        intervalAvg($intervalAvg, 91.25, "per quarter");
        intervalAvg($intervalAvg, 365.25, "per year");
        intervalAvg($intervalAvg, $intervalDays, "total");
        echo(round($dbSum / $dbSum02) . " min practiced per active practice day");
        
        function goalDiff($goalHr, $sumHr) {
            $minDiffRaw = $goalHr - $sumHr;
            echo "<br>" . abs(round(($minDiffRaw / 60)-0.5)) . " hr " . ($minDiffRaw % 60) . " min left to go";
        }
        
	    echo "<h3>GOALS FORECAST:</h3>";
	    echo abs(round(($dbSum03 / 60)-0.5)) . " hr " . ($dbSum03 % 60) . " min practiced since November 2014.";
	    echo "<br><br><b>Civic Orchestra (~750 hrs)</b>";
        echo "<br> Progress: about " . percentFunc($dbSum03, 45000) . "% completed";
        goalDiff(45000, $dbSum03);
        
        echo "<br><br><b>Lincoln Symphony Orchestra (~1500 hrs)</b>";
        echo "<br> Progress: about " . percentFunc($dbSum03, 90000) . "% completed";
        goalDiff(90000, $dbSum03);
        
        echo "<br><br><b>Fancy Orchestra (~7500 hrs)</b>";
        echo "<br> Progress: about " . percentFunc($dbSum03, 450000) . "% completed";
        goalDiff(450000, $dbSum03);
        
        echo "<br><br><b>Grand Master (~10,000 hrs)</b>";
        echo "<br> Progress: about " . percentFunc($dbSum03, 600000) . "% completed";
        goalDiff(600000, $dbSum03);

        echo("<p><a href=\"./dateForm01.html\">Select New Time Interval</a> </p>");
        
        mysql_free_result($queryInput);
    ?>
    </body>
</html>