<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

	if($result == true)
    {
		$_SESSION['userLoggedIn'] = $username;
		$_SESSION['user']= "user";
		header("Location: index.php");
	}
    else if($username=="admin" && $password=="admin")
    {
        $_SESSION['user'] = "admin";
	   header("Location: dashboard.php");
	   die();
    }

}
?>