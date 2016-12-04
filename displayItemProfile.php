<?php
	require_once 'addToCart.php';
    $result = $conn->prepare("call getItem($item_id)");
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    	$_SESSION['item_id'] = $row["itemID"];
        $itemID = $row["itemID"];
        $imgPath = $row["itemImgPath"];
        $itemName = $row["itemName"];
        $itemDesc = $row["itemDescription"];
        $itemPrice = $row["itemPrice"];
?>
	<div class="thumbnail">
	    <img class="img-responsive" src="<?php echo $imgPath ?>" alt="">
	    <div class="caption-full">
	        <h4 class="pull-right"><?php echo "$".$itemPrice ?></h4>
	        <h4><?php echo $itemName ?></h4>
	        <button class="addToCart" name="addToCart" type="submit">Add to cart</button>
	        <p><?php echo $itemDesc ?></p>
	    </div>
	</div>
<?php } ?>