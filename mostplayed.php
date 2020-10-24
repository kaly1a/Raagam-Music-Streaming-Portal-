<?php 
	session_start(); 
	if(isset($_SESSION['user'])){
		//echo("<pre>Logged in");
		//print_r($_SESSION['user']); 
	}else{
		header("Location: login.php");
		die();
	}
	include 'files/functions.php';
    $sql = "SELECT * FROM songs ORDER BY plays DESC LIMIT 10";
	$songs = mysqli_query($conn,$sql);
?>
<?php require_once("files/header.php"); ?> 

<div class="container">
 
	<div class="row">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Top 10 Most Popular</h2>
 
			<table class="table table-bordered">
			  <thead class="thead-dark">
			    <tr>
                  <th scope="col" style="width: 20%;">Id</th>
			      <th scope="col">Song Title</th>
                  <th scope="col" style="width: 20%;">Album</th>
			      <th scope="col" style="width: 20%;">Artist</th>
                  <th scope="col" style="width: 20%;">Genre</th>
			      <th scope="col" style="width: 20%;">Played</th>
			    </tr>
			  </thead>
                
			  <tbody>
			  	<?php foreach ($songs as $key => $a): ?>
				    <tr>
                     <td><?php 
				      	echo $a['id']; 
				      ?></td>
                     <td><?php 
				      	echo $a['title']; 
				      ?></td>
				      <td><?php 
				      	echo $a['album']; 
				      ?></td>
				      <td><?php 
				      	echo $a['artist']; 
				      ?></td>
                      <td><?php 
				      	echo $a['genre']; 
				      ?></td>
                        <td><?php 
				      	echo $a['plays']; 
				      ?></td>
				    </tr> 
			  	<?php endforeach ?>
			  </tbody>
			</table>

	 

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  