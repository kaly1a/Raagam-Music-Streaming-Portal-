<?php 
	session_start();
	include 'files/functions.php';

	$genre_id = $_GET['id'];
	
	$sql = "DELETE FROM songs WHERE genre  = {$genre_id}";
	$conn->query($sql);

	$sql = "DELETE FROM albums WHERE genre  = {$genre_id}";
	$conn->query($sql);
 
	$sql = "DELETE FROM genres WHERE id  = {$genre_id}";
	if($conn->query($sql)){
		message("The Genre was deleted successfully.","success"); 
	}else{ 
		message("Something went wrong while deleting the Genre.","danger");
	}
 
 	header("Location: admin_genre.php");
 	die();
 ?>

 