<?php 
	session_start(); 
	include 'files/functions.php';
	if(isset($_SESSION['user'])){
		 
	}else{
		header("Location: login.php");
		die();
	}

	if(isset($_POST["song_id"])){ 
		
		$song_id = $_POST['song_id'];
		$duration = $_POST["duration"];
		$song =  get_top_song_by_song_id($conn,$song_id);
 
		
		$song_mp3 = $song['song_mp3'];
	   
 

		if(isset($_FILES['song_mp3']['error'])){
			if($_FILES['song_mp3']['error'] == 0){
		 
				$target_dir = "assets/music/";
				
				$song_mp3 = time()."_".rand(100000,1000000).rand(10000,10000000)."_".$_FILES["song_mp3"]["name"];

				$song_mp3 = str_replace(" ", "_", $song_mp3);
				$song_mp3 = urlencode($song_mp3);
 

				$source = $_FILES["song_mp3"]["tmp_name"];
				$destination = $target_dir.$song_mp3;
				
				 if(move_uploaded_file($source, $destination)){
				 	if(file_exists($song['path'])){
				 		unlink($song['path']);
				 	} 
				 }else{ 
					 $song_mp3 = $song['path'];
				 }
			}
		}

		$song_name = $_POST['song_name'];
		$albums_id = $_POST['album_id'];
		$aritst_id = get_artist_from_album($conn, $albums_id);
        $genre_id = get_genre_from_album($conn, $albums_id);
		$sql = "UPDATE songs SET 
					title = '{$song_name}',
					artist = '{$aritst_id}',
					album = '{$albums_id}',
					genre = '{$genre_id}',
					duration = '{$duration}',
					path = '{$destination}'
				WHERE 
					id = {$song_id}
		";

		if($conn->query($sql)){ 
			message("Song was updated successfully.$song_name $aritst_id $album_id $destination $genre_id $aritst_id","success");
		}else{ 
			message("Something went wrong while updating the Song.","warning");
		}
		header("Location: admin_songs.php");
		die();
	}

	$albums = get_all_albums($conn);
	$artists = get_all_artists($conn);
	$song_id = $_GET['song_id'];

	$song =  get_top_song_by_song_id($conn,$song_id);
?>
<?php require_once("files/header.php"); ?> 
<div class="container">
	
<!-- 
	song_date 
 -->
	<div class="row pl-0">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Editing  <?php echo($song['title']); ?></h2>

			<form method="post" action="admin_edit_song.php" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="song_name">Song</label>
			    <input type="text" name="song_name" value="<?php echo($song['title']); ?>" class="form-control" id="song_name"  placeholder="Enter song name"> 
			  </div>
			  <div class="form-group">
			    <label for="duration">Song Duration</label>
			    <input type="text" name="duration" value="00:00" class="form-control" id="duration"  placeholder="Enter Song Duration"> 
			  </div>
			  <input type="text" name="song_id" hidden="" readonly="" value="<?= $song_id ?>" >
			  
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
 

 			<!--  <div class="form-group">
			   <div class="row">
			   		<div class="col-md-6">
			   			<label for="song_photo">Song photo</label>
					    <input type="file"  name="song_photo" class="form-control" id="song_photo"> 
			   		</div>
			   		<div class="col-md-6">
			   			<img class="rounded" width="100" src="uploads/<?//php echo($song['song_photo']); ?>" alt="">
			   		</div>
			   </div>
			  </div>-->


 			  <div class="form-group">
			   <div class="row">
			   		<div class="col-md-6">
					    <label for="song_mp3">Song mp3</label>
					    <input type="file" accept=".mp3" name="song_mp3" class="form-control" id="song_mp3">
			   		</div>
			   		<div class="col-md-6">
			   			<br>
					    <audio controls>
							  <source src="horse.ogg" type="audio/ogg">
							  <source src="<?php echo $song['path']; ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio> 
			   		</div>
			   </div>	 
			  </div>

			  <button type="submit" class="float-right mt-md-3 btn btn-lg btn-dark">Update Song</button>

			</form>

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  