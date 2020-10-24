<?php
session_start();  
 require_once("files/header.php");
 $con = mysqli_connect("localhost", "root", "", "raagam");
 $query = "SELECT genres.name, count(songs.genre) as number FROM genres, songs where genres.id = songs.genre GROUP BY genres.name";  
 $result = mysqli_query($con, $query); 
 ?>

<html>
  <head>
  <title>Admin Dashboard</title>  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Genres', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["name"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of each Genre',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));  
                chart.draw(data, options);  
           }  
    </script>
  </head>
<div class="container">
	<div class="row">
		<?php include ("files/admin_side_bar.php"); ?>
		<div class="col-md-8">
        <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Popular Album Genres</h3>  
                <br>  
                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>  
           </div>  
           <?php include ("bar.php"); ?> 
      </body>  
  </html>
    </div>
</div>
<?php require_once("files/footer.php"); ?> 
