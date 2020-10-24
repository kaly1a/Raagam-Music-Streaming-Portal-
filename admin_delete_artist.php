<?php 
	session_start();
	include 'files/functions.php';

	$artist_id = $_GET['id'];
	
	$sql = "DELETE FROM albums WHERE artist  = {$artist_id}";
	$conn->query($sql);

	$sql = "DELETE FROM songs WHERE artist  = {$artist_id}";
	$conn->query($sql);
 
	$sql = "DELETE FROM artists WHERE id  = {$artist_id}";
	if($conn->query($sql)){
		message("The Artist was deleted successfully.","success"); 
	}else{ 
		message("Something went wrong while deleting the Artist.","danger");
	}
 
 	header("Location: admin_artists.php");
 	die();
 ?>

 