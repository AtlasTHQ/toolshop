<?php
session_start();
$cartID = $_SESSION['cart_id'];
if (isset($_POST[$cartID]))
{
    $cartID = $_SESSION['cart_id'];
    $result = $conn->prepare("call removeFromCart($cartID)");
    $result->execute();
    header("cart.php");
}
?>