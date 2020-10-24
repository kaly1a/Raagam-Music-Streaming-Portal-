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
	$songs = get_all_songs($conn);
?>
<?php require_once("files/header.php"); ?> 

<div class="container">
 
	<div class="row">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>All Songs</h2>

			<a href="admin_song_upload.php" class="btn btn-dark float-right mt-md-3 mb-md-3">
				Add new song
			</a>
 
			<table class="table table-bordered">
			  <thead class="thead-dark">
			    <tr>
                  <th scope="col" style="width: 20%;">Id</th>
			      <th scope="col">Song Title</th>
                  <th scope="col" style="width: 20%;">Album</th>
			      <th scope="col" style="width: 20%;">Artist</th>
                  <th scope="col" style="width: 20%;">Genre</th>
			      <th scope="col" style="width: 20%;">Options</th>
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
				      <td><div class="btn-group btn-group-sm">
				      	<a href="admin_edit_song.php?song_id=<?php echo($a['id']); ?>" class="btn btn-dark" title="">Edit</a>
				      	<a href="admin_delete_process.php?song_id=<?php echo($a['id']); ?>" class="btn btn-danger" title="">Delete</a>
				      </div></td>
				    </tr> 
			  	<?php endforeach ?>
			  </tbody>
			</table>

	 

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  