<!DOCTYPE html>
<html>
    <head>
        <script src="../js/Chart.js"></script>
        <script>
            var data = [
                {
                    value: 300,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Red"
                },
                {
                    value: 50,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "Yellow"
                },
                {
                    value: 40,
                    color: "#949FB1",
                    highlight: "#A8B3C5",
                    label: "Grey"
                },
                {
                    value: 120,
                    color: "#4D5360",
                    highlight: "#616774",
                    label: "Dark Grey"
                }
            ];

            function page_startup(){
                /*global Chart*/
                var ctx = document.getElementById("myChart").getContext("2d");
                //var myNewChart = 
                new Chart(ctx).PolarArea(data);
            }
        </script>
    </head>
    <body onload="page_startup();">
        <canvas id="myChart" width="400" height="400"></canvas>

    </body>
</html>