<!DOCTYPE html>
<html>
    <head>
        <title>Lego Title v01</title>
        <style> 
        body { background-color: Gray; }
        </style>
    </head>
    
    <body>
        <h1>LEGOS!</h1>
        <p>Build build build.</p>
    <?php
        //source of following: http://stackoverflow.com/questions/676824/how-to-calculate-the-difference-between-two-dates-using-php
        $begDateA = "2014-09-03";
        $endDateA = "2015-11-06";
        $minPerDay = 15.6; 
        $begDate = new DateTime($begDateA);
        $endDate = new DateTime($endDateA);
        $interval = $begDate->diff($endDate);
        $intervalDays = ($interval->days);
        echo($intervalDays . " day interval between " . $begDateA . " and " . $endDateA . "<br>");
        $totalTime = $intervalDays * $minPerDay; //my first decimal = 6692.4 @ 15.6min/day * 429 days
        echo $totalTime . " total raw minutes <br>";
        $totalTimeRound = (round($totalTime - 0.5));
        echo($totalTimeRound . " total minutes rounded down <br>");
        $minPerDayAvg = $totalTime / $intervalDays; //use this raw number to calculate, then round off end result when printing
        echo($minPerDayAvg . " raw minutes per day average <br>");
        echo(round($minPerDayAvg) . " rounded minutes per day average <br>");
        
        function minPerInterval($x, $y) {
            ($x * $y);
            return($x * $y);
        }
        //echo(minPerInterval($minPerDayAvg, 7) . "");
        $minPerDayAvg = minPerInterval($minPerDayAvg, 1);
        $minPerWeekAvg = minPerInterval($minPerDayAvg, 7);
        $minPerMonthAvg = minPerInterval($minPerDayAvg, 30.4375);
        $minPerQuarterAvg = minPerInterval($minPerDayAvg, 91.25);
        $minPerYearAvg = minPerInterval($minPerDayAvg, 365.25);
        
        function intervalAvg($var, $int, $str) {
            echo (round(($var * $int / 60)-0.5) . " hour(s) " . ($var * $int % 60) . " minute(s) per $str average <br>");
        }
        intervalAvg($minPerDayAvg, 1, "day");
        intervalAvg($minPerDayAvg, 7, "week");
        intervalAvg($minPerDayAvg, 30.4375, "month");
        intervalAvg($minPerDayAvg, 91.25, "quarter");
        intervalAvg($minPerDayAvg, 365.25, "year");
        
        echo(round(($minPerDayAvg / 60) - 0.5) . " hour(s) " . ($minPerDayAvg % 60) . " minutes per day average <br>"); //this formula should be looped somehow!
        //Jimbo talking about how this section could be made to look simpler:
        //myMinutesComputer($minPerDayAvg, 'day')
        //myMinutesComputer($minPerWeekAvg, 'week')
        // -> "0 hour(s) 15.6 minutes per day average <br>"
        // -> "1 hour(s) 3.2 minutes per week average <br>"
        $minPerWeekAvg = ($minPerDayAvg * 7);
        echo(round($minPerWeekAvg) . " rounded minutes per week average <br>");
        echo(round(($minPerWeekAvg / 60) - 0.5) . " hour(s) " . ($minPerWeekAvg % 60) . " minutes per week average <br>");
        $minPerMonthAvg = ($minPerDayAvg * 30.4375); //365.25 / 12
        echo(round($minPerMonthAvg) . " rounded minutes per month average <br>");
        $minPerQuarterAvg = ($minPerDayAvg * 91.25);
        echo(round($minPerQuarterAvg) . " rounded minutes per quarter average <br>");
        $minPerYearAvg = ($minPerDayAvg * 365.25);
        echo(round($minPerYearAvg) . " rounded minutes per year average <br>");
    ?>
    </body>
</html>
