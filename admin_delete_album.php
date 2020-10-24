<?php 
	session_start();
	include 'files/functions.php';

	$album_id = $_GET['id'];
	
	$sql = "DELETE FROM songs WHERE album  = {$album_id}";
	$conn->query($sql);
 
	$sql = "DELETE FROM albums WHERE id  = {$album_id}";
	if($conn->query($sql)){
		message("The Album was deleted successfully.","success"); 
	}else{ 
		message("Something went wrong while deleting the Album.","danger");
	}
 
 	header("Location: admin_album.php");
 	die();
 ?>

 