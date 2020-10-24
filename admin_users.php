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
	$users = get_all_users($conn);
?>
<?php require_once("files/header.php"); ?> 

<div class="container">
	

	<div class="row">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>All Users</h2>


			<table class="table table-bordered">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Id</th>
                  <th scope="col">Profile Pic</th>
			      <th scope="col">UserName</th>
                   <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                  <th scope="col">SignUp Date</th> 
			      <th scope="col" style="width: 20%;">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($users as $key => $a): ?>
				    <tr>
				      <td><?php 
				      	echo $a['id']; 
				      ?></td>
				      <td>
                        <img src="$a['profilePic']" width="50" height="100">
                      </td>
                        <td><?php 
				      	echo $a['username']; 
				      ?></td>
                     <td><?php 
				      	echo $a['firstName']; 
				      ?></td>
                      <td><?php 
				      	echo $a['lastName']; 
				      ?></td>
                      <td><?php 
				      	echo $a['email']; 
				      ?></td>
                      <td><?php 
				      	echo $a['signUpDate']; 
				      ?></td>
				      <td><div class="btn-group btn-group-sm">
				      	<a href="#" class="btn btn-danger" title="">Delete</a>
				      </div></td>
				    </tr> 
			  	<?php endforeach ?>
			  </tbody>
			</table>

	 

		</div>
	</div>

</div>


<?php require_once("files/footer.php"); ?> 

  