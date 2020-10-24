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
	$songs = get_all_feedbacks($conn);
?>
<?php require_once("files/header.php"); ?> 
<div class="container">
 
	<div class="row">
		<?php include 'files/admin_side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Feedback</h2>
            <table class="table table-bordered">
			  <thead class="thead-dark">
			    <tr>
                  <th scope="col" style="width: 10%;">S.No</th>
			      <th scope="col"style="width: 20%;"><center>Username</center></th>
                  <th scope="col" ><center>Feedback</center></th>
                </tr>
                </thead>
			<tbody>

			<?php  $i=1;
			 foreach ($songs as $key => $a): ?>
				    <tr><center>
                     <td><?php 
				      	echo $i; 
				      ?> </center></td>
                     <td> <center><?php 
				      	echo $a['user_name']; 
				      ?> </center></td>
				      <td> <center><?php 
				      	echo $a['feedback']; 
				      ?> </center></td>
            </div></td>
				    </tr>
				  <?php $i= $i+1;
				   endforeach ?>
			  </tbody>
			</table>
        </div>
    </div>
</div>