<?php 
	session_start(); 
	include 'files/functions.php';
	if(isset($_SESSION['user'])){
		 
	}else{
		header("Location: login.php");
		die();
	}
	

	
	
	if(isset($_POST['artist_name'])){  
		$artist_id = $_POST['artist_id'];
		$artist_name = $_POST['artist_name'];

		$SQL = "UPDATE artists SET name = '{$artist_name}' WHERE 
		id = {$artist_id}";

		if($conn->query($SQL)){
			message("Artist updated successfully.","success");
		}else{
			message("Something went wrong while updating the Artist.","warning");
		}

		header("Location: admin_artists.php");
		die();
	}
	else {
		$artist_id = $_GET['id'];
		$artist_name = get_artist_by_artist_id($conn,$artist_id);
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
			<h2>Update Artist: <b><?php echo $artist_name ?></b></h2>

			<form method="post" action="admin_edit_artist.php" enctype="multipart/form-data">
			  <div class="form-group">
			  <input type="text" name="artist_id" hidden="" readonly="" value="<?= $artist_id ?>" >
			    <label for="artist_name">Artist</label>
			    <input type="text" name="artist_name" class="form-control" id="artist_name" aria-describedby="emailHelp" placeholder="Enter artist name"> 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Update Artist</button>

			</form>

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  