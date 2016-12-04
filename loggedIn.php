<?php
	$firstNameLoggedIn = "";
	$lastNameLoggedIn = "";
	$username = $_SESSION['login_user'];
	$dbUsers = new Users($conn);
    $result = $dbUsers->getUser($username);
    $_SESSION['user_id'] = $result[0];
    $firstNameLoggedIn = $result[1];
    $lastNameLoggedIn = $result[2];
?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo $firstNameLoggedIn . " " . $lastNameLoggedIn;?></b> <span class="caret"></span></a>
    <ul class="dropdown-menu">
	    <li><a href="#">Profile</a></li>
	    <li><a href="#">Cart</a></li>
	    <li role="separator" class="divider"></li>
	    <li><a href="logout.php">Logout</a></li>
 	</ul>
</li>