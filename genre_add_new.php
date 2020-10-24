<?php 
	session_start(); 
	include 'files/functions.php';
	if(isset($_SESSION['user'])){
		 
	}else{
		header("Location: login.php");
		die();
	}

	if(isset($_POST['genre_name'])){  
		$genre_name = $_POST['genre_name'];

		$SQL = "INSERT INTO genres(
						name
					)VALUES(
						'{$genre_name}'
					)
				";

		if($conn->query($SQL)){
			message("New genre was created successfully.","success");
		}else{
			message("Something went wrong while creating New genre.","warning");
		}

		header("Location: admin_genre.php");
		die();
	}

?>
<?php require_once("files/header.php"); ?> 
<div class="container">
	

	<div class="row pl-0">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Adding new Genre</h2>

			<form method="post" action="genre_add_new.php" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="genre_name">Genre</label>
			    <input type="text" name="genre_name" class="form-control" id="genre_name" aria-describedby="emailHelp" placeholder="Enter Genre name"> 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Add Genre</button>

			</form>

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  