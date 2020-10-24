<?php 
	session_start(); 
	include 'files/functions.php';
	if(isset($_SESSION['user'])){
		 
	}else{
		header("Location: login.php");
		die();
	}
	

	
	
	if(isset($_POST['genre_name'])){  
		$genre_id = $_POST['genre_id'];
		$genre_name = $_POST['genre_name'];

		$SQL = "UPDATE genres SET name = '{$genre_name}' WHERE 
		id = {$genre_id}";

		if($conn->query($SQL)){
			message("Genre updated successfully.","success");
		}else{
			message("Something went wrong while updating the Genre.","warning");
		}

		header("Location: admin_genre.php");
		die();
	}
	else {
		$genre_id = $_GET['id'];
		$genre_name = get_genre_from_id($conn,$genre_id);
	}
	
?>
<?php require_once("files/header.php"); ?> 

<div class="container">
	

	<div class="row pl-0">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Update Genre: <b><?php echo $genre_name ?></b></h2>

			<form method="post" action="admin_edit_genre.php" enctype="multipart/form-data">
			  <div class="form-group">
			  <input type="text" name="genre_id" hidden="" readonly="" value="<?= $genre_id ?>" >
			    <label for="genre_name">Genre</label>
			    <input type="text" name="genre_name" class="form-control" id="genre_name" aria-describedby="emailHelp" placeholder="Enter Genre name"> 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Update Genre</button>

			</form>

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  