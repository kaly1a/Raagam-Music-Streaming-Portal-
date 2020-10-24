<?php
include("../../config.php");

if(isset($_POST['artistId'])) {
	$artistId = $_POST['artistId'];

	$artistQuery = mysqli_query($con, "DELETE FROM artist WHERE id='$artistId'");
}
else {
	echo "PlaylistId was not passed into deletePlaylist.php ";
}
?>