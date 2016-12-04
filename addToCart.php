<?php
if (isset($_POST['addToCart'])) 
{
	$userID = $_SESSION['user_id'];
	$itemID = $_SESSION['item_id'];
	echo $userID;
	echo $itemID;
	$dbCart = new Cart($conn);
    $dbCart->addToCart($userID,$itemID);
}
?>