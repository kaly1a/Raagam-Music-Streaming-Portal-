<?php
$con = mysqli_connect("localhost", "root", "", "raagam");
$query = "SELECT title, plays FROM songs ORDER BY plays DESC LIMIT 10"; 
$result = mysqli_query($con, $query);
?>
<html>
  <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
            /* Define the chart to be drawn.*/
            var data = google.visualization.arrayToDataTable([
                ['Songs', 'Played'],
          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            echo "['".$row["title"]."', ".$row["plays"]."],";  
                          }  
         ?> 
        ]);

        var options = {
                title: 'Top Songs Played',
                pieHole: 0.5,
            };
            

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    </head>
      <body>
      <div id="donutchart" style="width: 900px; height: 500px;"></div>
    </body>
</html>
