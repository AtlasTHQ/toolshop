<?php
require_once "connection.php";

session_start();
if (isset($_POST['cart_id']))
{
	//echo $_POST['cart_id'];
	$cartID = $_POST['cart_id'];
    $result = $conn->prepare("call removeFromCart($cartID)");
    $result->execute();
    header("cart.php");
}
    
?>