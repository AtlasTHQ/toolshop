<?php
$error=''; // Variable To Store Error Message
if (isset($_POST['loginUser'])) {
	require_once 'connection.php';
	// Define $username and $password
	$username=$_POST['log_username'];
	$password=$_POST['log_password'];
	// To protect MySQL injection for Security purpose
	$username = stripslashes($username);
	$password = stripslashes($password);
	// SQL query to fetch information of registerd users and finds user match.
	$query = "select count(*) from users where userName='".$username."' AND userPassword='".$password."';";
	$queryResult = $conn->prepare($query);
	$queryResult->execute();
	$number_of_rows = $queryResult->fetchColumn();
	if ($number_of_rows == 1) {
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