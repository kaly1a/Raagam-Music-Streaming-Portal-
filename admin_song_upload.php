<?php 
	session_start(); 
	include 'files/functions.php';
	if(isset($_SESSION['user'])){
		 
	}else{
		header("Location: login.php");
		die();
	}

	if(isset($_POST['song_name'])){
		$file_name = "";  
		$song_mp3 = "";

		if(isset($_FILES['song_mp3']['error'])){
			if($_FILES['song_mp3']['error'] == 0){
		 
				$target_dir = "assets/music/";
				
				$song_mp3 = time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["song_mp3"]["name"];

				$song_mp3 = str_replace(" ", "_", $song_mp3);
				$song_mp3 = urlencode($song_mp3);
 

				$source = $_FILES["song_mp3"]["tmp_name"];
				$destination = $target_dir.$song_mp3;
				
				 if(move_uploaded_file($source, $destination)){
				 	 
				 }else{
				 	$song_mp3 = "";
				 }
			}
		}

		$song_name = $_POST['song_name'];
		$duration = $_POST["duration"];
        $albums_id = $_POST['album_id'];
		$artist_id = get_artist_from_album($conn, $albums_id);
        $genre_id = get_genre_from_album($conn, $albums_id);
		$SQL = "INSERT INTO songs(
						title,artist,album,genre,duration,path
					)VALUES(
						'{$song_name}','{$artist_id}','{$albums_id}','{$genre_id}','{$duration}','{$destination}'
					)
				";

		if($conn->query($SQL)){ 
			message("New song was uploaded successfully.","success");
		}else{ 
			message("Something went wrong while uploading New Song.","warning");
		}

		header("Location: admin_songs.php");
		die();
	}
	$albums = get_all_albums($conn);
	
?>
<?php require_once("files/header.php"); ?> 
<div class="container">
	
<!-- 
		song_date		
 -->
	<div class="row pl-0">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Uploading new song</h2>

			<form method="post" action="admin_song_upload.php" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="song_name">Song</label>
			    <input type="text" name="song_name" class="form-control" id="song_name"  placeholder="Enter Song name"> 
			  </div>

			  <div class="form-group">
			    <label for="duration">Song Duration</label>
			    <input type="text" name="duration" value="00:00" class="form-control" id="duration"  placeholder="Enter Song Duration"> 
			  </div>
		
			  <div class="form-group">
			    <label for="album_id">Album</label>
			    <select name="album_id" required="" class="form-control">
			    	<option value=""></option>
			    	<?php foreach ($albums as $key => $a): ?>
			    		
			    		<?php if($a['id'] == $song['album']){ ?>
			    			<option selected="" value="<?php echo($a['id']); ?>"><?php echo($a['title']); ?></option>
			    		<?php }else{ ?>
			    			<option value="<?php echo($a['id']); ?>"><?php echo($a['title']); ?></option>
			    		<?php } ?>
			    		
			    	<?php endforeach ?>
				</select>
 			  </div>
 			  <div class="form-group">
			    <label for="song_mp3">Song mp3</label>
			    <input type="file" accept=".mp3" name="song_mp3" class="form-control" id="song_mp3"> 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Add Song</button>

			</form>

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  