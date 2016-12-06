<?php
	$userID = $_SESSION['user_id'];
    $result = $conn->prepare("call getCart($userID)");
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    	//$_SESSION['cart_id'] = $row["cartID"];
        $cart = $row['cartID'];
        $imgPath = $row["itemImgPath"];
        $itemName = $row["itemName"];
        $itemDesc = $row["itemDescription"];
        $itemPrice = $row["itemPrice"]; ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <div class="imageResizer">
                <img src="<?php echo $imgPath ?>">
            </div>
            <div class="caption">
                <h4 class="pull-right"><?php echo "$".$itemPrice ?></h4>
                <h4><?php echo $itemName ?></h4>
                <p>
                	<form method="post" action="removeFromCart.php">
                		<button class="removeFromCartButton" type="submit" name="cart_id" value="<?php echo $cart ?>">X</button><br>
                	</form>
                	<?php echo $itemDesc ?>
                </p>
            </div>
        </div>
    </div>
<?php } ?>