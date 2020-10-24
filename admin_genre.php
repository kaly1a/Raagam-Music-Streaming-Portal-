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
	$genre = get_all_genre($conn);
?>
<?php require_once("files/header.php"); ?> 

<div class="container">
	

	<div class="row">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>All Genre</h2>
 
			<a href="genre_add_new.php" class="btn btn-dark float-right mt-md-3 mb-md-3">
				Add new Genre
			</a>

			<table class="table table-bordered">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Id</th>
			      <th scope="col">Name</th> 
			      <th scope="col" style="width: 20%;">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($genre as $key => $a): ?>
				    <tr>
				      <td><?php 
				      	echo $a['id']; 
				      ?></td>
				      <td><?php 
				      	echo $a['name']; 
	 			      ?></td>
   				      <td><div class="btn-group btn-group-sm">
				      	<a href="admin_edit_genre.php?id=<?php echo($a['id']); ?>" class="btn btn-dark" title="">Edit</a>
				      	<a href="admin_delete_genre.php?id=<?php echo($a['id']); ?>" class="btn btn-danger" title="">Delete</a>
				      </div></td>
				    </tr> 
			  	<?php endforeach ?>
			  </tbody>
			</table>

	 

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  