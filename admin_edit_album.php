<?php 
	session_start(); 
	include 'files/functions.php';
	if(isset($_SESSION['user'])){
		 
	}else{
		header("Location: login.php");
		die();
	}
	

	
	
	if(isset($_POST['album_name'])){  
		$album_id = $_POST['album_id'];
		$album_name = $_POST['album_name'];
		$genre_id = $_POST['genre_id'];
		$albums =  get_album_by_id($conn,$album_id);
	
	if(isset($_FILES['album_photo']['error'])){
	if($_FILES['album_photo']['error'] == 0){
 
		$target_dir = "assets/images/artwork";
		
		$album_photo = time()."_".rand(100000,1000000).rand(10000,10000000)."_".$_FILES["album_photo"]["name"];

		$album_photo = str_replace(" ", "_", $album_photo);
		$album_photo = urlencode($album_photo);


		$source = $_FILES["album_photo"]["tmp_name"];
		$destination = $target_dir.$album_photo;
		
		 if(move_uploaded_file($source, $destination)){
			 if(file_exists($target_dir.$albums['artworkPath'])){
				 unlink($target_dir.$albums['artworkPath']);
			 } 
		 }else{ 
			 $album_photo = $albums['artworkPath'];
		 }
	}
}

$artist_id = get_artist_from_album($conn, $album_id);
$sql = "UPDATE albums SET 
title = '{$album_name}',
artist = '{$artist_id}',
genre = '{$genre_id}',
artworkPath = '{$destination}'
WHERE 
id = {$album_id}
";

if($conn->query($sql)){ 
message("Album was updated successfully.$song_name $artist_id $album_id $destination $genre_id","success");
}else{ 
message("Something went wrong while updating the Album.","warning");
}
header("Location: admin_albums.php");
die();
	}
	else {
		$album_id = $_GET['id'];
		$album_name = get_album_from_id($conn, $album_id);
		$genre = get_all_genre($conn);
	}
	
?>
<?php require_once("files/header.php"); ?> 

<div class="container">
	

	<div class="row pl-0">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Update Album: <b><?php echo $album_name ?></b></h2>

			<form method="post" action="admin_edit_album.php" enctype="multipart/form-data">
			  <div class="form-group">
			  <input type="text" name="album_id" hidden="" readonly="" value="<?= $album_id ?>" >
			    <label for="album_name">Album</label>
			    <input type="text" name="album_name" class="form-control" id="album_name" aria-describedby="emailHelp" placeholder="Enter album name" required> 
			  </div>

			  <div class="form-group">
			    <label for="genre_id">Genre</label>
			    <select name="genre_id" required="" class="form-control">
			    	<option value=""></option>
			    	<?php foreach ($genre as $key => $a): ?>
			    		
			    		<?php if($a['id'] == $album['genre']){ ?>
			    			<option selected="" value="<?php echo($a['id']); ?>"><?php echo($a['name']); ?></option>
			    		<?php }else{ ?>
			    			<option value="<?php echo($a['id']); ?>"><?php echo($a['name']); ?></option>
			    		<?php } ?>
			    		
			    	<?php endforeach ?>
			    </select>
			  </div>
			  <div class="form-group">
			   <div class="row">
			   		<div class="col-md-6">
			   			<label for="album_photo">Ablum Art</label>
					    <input type="file"  name="album_photo" class="form-control" id="album_photo"> 
			   		</div>
			   		<div class="col-md-6">
			   			<img class="rounded" width="100" src="assets/images/artwork/<?php echo($song['album_photo']); ?>" alt="">
			   		</div>
			   </div>
			  </div>
			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Update Album</button>

			</form>

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  