<?php
	$error=''; // Variable To Store Error Message
	if (isset($_POST['loginUser'])) {
		require_once 'connection.php';
		require_once 'procedures.php';
		// Define $username and $password
		$username=$_POST['log_username'];
		$password=$_POST['log_password'];
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		// SQL query to fetch information of registerd users and finds user match.
		$dbUsers = new Users($conn);
		if ($dbUsers->validateUser($username,$password)) {
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: index.php"); // Redirecting To Other Page
			if(!isset($_SESSION)) 
		    {
		        session_start(); 
		    }
		} else {
			header("location: index.php"); // Redirecting To Other Page
			$error = "Username or Password is invalid";
			echo '<script type="text/javascript">alert('.$error.');</script>';
		}
	}
?>
