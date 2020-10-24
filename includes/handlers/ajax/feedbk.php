<?php
include("../../config.php");

if(isset($_POST['name']) && isset($_POST['username'])) {

	$name = $_POST['name'];
	$username = $_POST['username'];
	$query = mysqli_query($con, "INSERT INTO feedback VALUES('', '$name', '$username')");

}
else {
	echo "Feedback or username parameters not passed into file";
}

?>