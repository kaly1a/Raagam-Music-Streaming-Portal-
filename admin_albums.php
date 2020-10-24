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
	$albums = get_all_albums($conn);
?>
<?php require_once("files/header.php"); ?> 

<div class="container">
	

	<div class="row">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>All Albums</h2>
 
			<a href="albums_add_new.php" class="btn btn-dark float-right mt-md-3 mb-md-3">
				Create new Album
			</a>

			<table class="table table-bordered">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Id</th>
			      <th scope="col">Title</th>
                  <th scope="col">Artist</th>
                  <th scope="col">Genre</th> 
			      <th scope="col" style="width: 20%;">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($albums as $key => $a): ?>
				    <tr>
				      <td><?php 
				      	echo $a['id']; 
				      ?></td>
				      <td><?php 
				      	echo $a['title']; 
				      ?></td>
                     <td><?php 
				      	echo $a['artist']; 
				      ?></td>
                      <td><?php 
				      	echo $a['genre']; 
				      ?></td>
				      <td><div class="btn-group btn-group-sm">
				      	<a href="admin_edit_album.php?id=<?php echo($a['id']); ?>" class="btn btn-dark" title="">Edit</a>
				      	<a href="admin_delete_album.php?id=<?php echo($a['id']); ?>" class="btn btn-danger" title="">Delete</a>
				      </div></td>
				    </tr> 
			  	<?php endforeach ?>
			  </tbody>
			</table>

	 

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  