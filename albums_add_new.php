<?php 
	session_start(); 
	include 'files/functions.php';
	if(isset($_SESSION['user'])){
		 
	}else{
		header("Location: login.php");
		die();
	}

	if(isset($_POST['album_name'])){
		$file_name = "";  

		if(isset($_FILES['album_photo']['error'])){
			if($_FILES['album_photo']['error'] == 0){
		 
				$target_dir = "assets/images/artwork";
				
				$file_name = time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["album_photo"]["name"];

				$file_name = str_replace(" ", "_", $file_name);
 

				$source = $_FILES["album_photo"]["tmp_name"];
				$destinatin = $target_dir.$file_name;
				
				 if(move_uploaded_file($source, $destinatin)){
				 	 
				 }else{
				 	$file_name = "";
				 }
			}
		}

		$album_name = $_POST['album_name'];
        $artist_id = $_POST['artist_id'];
        $genre_id = $_POST['genre_id'];

		$SQL = "INSERT INTO albums(
						title,artist,genre,artworkPath
					)VALUES(
						'{$album_name}','{$artist_id}','{$genre_id}','{$destinatin}'
					)
				";

		if($conn->query($SQL)){
			message("New album was created successfully.","success");
		}else{
			message("Something went wrong while creating New album.$album_name}','{$artist_id}','{$genre_id}',{$destinatin}","warning");
		}

		header("Location: admin_albums.php");
		die();
	}
	
    $artists = get_all_artists($conn);
    $genre = get_all_genre($conn);
?>

<?php require_once("files/header.php"); ?> 
<!-- 
 			artist_details 	

 -->
<div class="container">
	

	<div class="row pl-0">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Adding new Album</h2>

			<form method="post" action="albums_add_new.php" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="album_name">Album</label>
			    <input type="text" name="album_name" class="form-control" id="album_name" aria-describedby="emailHelp" placeholder="Enter Album name"> 
			  </div>
                 
			  <div class="form-group">
			    <label for="artist_id">Artist</label>
			    <select name="artist_id" required="" class="form-control">
			    	<option value=""></option>
			    	<?php foreach ($artists as $key => $a): ?>
			    		<option value="<?php echo($a['id']); ?>"><?php echo($a['name']); ?></option>
			    	<?php endforeach ?>
			    </select>
			  </div>
                
              <div class="form-group">
			    <label for="genre_id">Genre</label>
			    <select name="genre_id" required="" class="form-control">
			    	<option value=""></option>
			    	<?php foreach ($genre as $key => $a): ?>
			    		<option value="<?php echo($a['id']); ?>"><?php echo($a['name']); ?></option>
			    	<?php endforeach ?>
			    </select>
			  </div>
                
 			  <div class="form-group">
			    <label for="album_photo">Album Art</label>
			    <input type="file" accept=".png,.jpg,.jpeg,.gif" name="album_photo" class="form-control" id="album_photo" placeholder="Enter album art link"> 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Add Album</button>

			</form>

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  