<!DOCTYPE html>
<html>
    <head>
        <script src="../js/Chart.js"></script>
        <script>
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [
                    {
                        label: "2014: Minutes Practiced per Month",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [null, null, null, null, null, null, null, null, null, null, 15, 135]
                    },
                    {
                        label: "2015: Minutes Practiced per Month",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [315, 372, 278, 991, 803, 215, 376, 143, 225, 407, 175, null]
                    }
                ]
            };

            //var myNewChart;
            function page_startup(){
                /*global Chart*/
                var ctx = document.getElementById("myChart").getContext("2d");
                var myNewChart = new Chart(ctx).Line(data, {bezierCurve: true});
                document.getElementById("placeLegendHere").innerHTML = myNewChart.generateLegend();
            }
        </script>
    </head>
    <body onload="page_startup();">
        <canvas id="myChart" width="600" height="400"></canvas>
        <div id="placeLegendHere"></div>
    </body>
</html>