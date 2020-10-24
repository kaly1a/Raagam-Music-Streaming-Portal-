<?php 
	session_start(); 
	include 'files/functions.php';
	if(isset($_SESSION['user'])){
		 
	}else{
		header("Location: login.php");
		die();
	}

	if(isset($_POST['artist_name'])){  
		$artist_name = $_POST['artist_name'];

		$SQL = "INSERT INTO artists(name)VALUES('{$artist_name}')";

		if($conn->query($SQL)){
			message("New artist was created successfully.","success");
		}else{
			message("Something went wrong while creating New artist.","warning");
		}

		header("Location: admin_artists.php");
		die();
	}

?>
<?php require_once("files/header.php"); ?> 
<!-- 
 			artist_details 	

 -->
<div class="container">
	

	<div class="row pl-0">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Adding new Artist</h2>

			<form method="post" action="artist_add_new.php" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="artist_name">Artist</label>
			    <input type="text" name="artist_name" class="form-control" id="artist_name" aria-describedby="emailHelp" placeholder="Enter Artist name"> 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Add Artist</button>

			</form>

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  