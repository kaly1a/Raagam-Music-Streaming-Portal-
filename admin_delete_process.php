<?php 
	session_start();
	include 'files/functions.php';

	$song_id = $_GET['song_id'];
	$song =  get_top_song_by_song_id($conn,$song_id);

	//Deleting a song file
	$song_mp3_location = "assets/music/".$song['song_mp3']; 
	if(file_exists($song_mp3_location)){ // checking if a file exists before I delete
		unlink($song_mp3_location); //Delete a file 
	} 

	

	$sql = "DELETE FROM playlistsongs WHERE songId  = {$song_id}";
	$conn->query($sql);
 
	$sql = "DELETE FROM songs WHERE id  = {$song_id}";
	if($conn->query($sql)){
		message("The Song was deleted successfully.","success"); 
	}else{ 
		message("Something went wrong while deleting the Song. $song_id","danger");
	}
 
 	header("Location: admin_songs.php");
 	die();
 ?>

 