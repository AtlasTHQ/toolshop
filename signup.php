<?php 
if (isset($_POST['registerUser'])) {
    $firstname = trim($_POST['reg_firstName']);
    $lastname = trim($_POST['reg_lastName']);
    $email = trim($_POST['reg_email']);
    $username = trim($_POST['reg_username']);
    $password = trim($_POST['reg_password']);

    require_once 'procedures.php';
    require_once 'connection.php';
    $errors[] = "";
    $dbUsers = new Users($conn);
    $status = $dbUsers->newUser($firstname,$lastname,$email,$username,$password);

    if ($status) {
        header("location:index.php");
    }
    else{
        $errors[] = "$username is already in use. Please choose another username.";
        echo $errors;
    } 
}
?>