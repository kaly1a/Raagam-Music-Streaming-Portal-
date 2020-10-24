<?php 
	if(isset($_SESSION['user']) && $_SESSION['user']=="admin"){
		//echo("<pre>Logged in");
		//print_r($_SESSION['user']); 
	}else{
		header("Location: register.php");
		die();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Raagam</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light container">
	  <a class="navbar-brand" href="dashboard.php">Raagam</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto"> 
	      <li class="nav-item">
	        <a class="nav-link" href="mostplayed.php">Most Played</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="latest.php">Latest Tracks</a>
	      </li>  
	      <li class="nav-item">
	      	<?php if (isset($_SESSION['user'])){ ?>
		        <!-- <a class="nav-link text-danger" href="logount_process.php">Logout</a> -->
		        <a class="nav-link" href="my_account.php">My Account</a>
	      	<?php }else{ ?>
		        <a class="nav-link" href="login.php">Login</a>	      	
	      	<?php } ?>

	      </li>  
	       <li class="nav-item">
            <?php if (isset($_SESSION['user'])){ ?>
	        <a class="btn btn-dark btn-sm mt-1" href="logout_process.php">LOGOUT</a>
            <?php	} ?>
	      </li>  
	    </ul>
	  </div>
	</nav>

<?php if(isset($_SESSION['message'])){ ?>
	<div class="alert alert-<?= $_SESSION['message']['type'] ?>  m-3">
		<?php 
			echo($_SESSION['message']['body']);
			unset($_SESSION['message']);
		 ?>
	</div>
<?php	} ?>