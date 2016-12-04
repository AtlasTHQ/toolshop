<?php
session_start();
if (isset($_POST['addToCart'])) 
{
	$userID = $_SESSION['user_id'];
	$itemID = $_SESSION['item_id'];
	$dbCart = new Cart($conn);
    $dbCart->addToCart($userID,$itemID);
}
?>