<?php 
    $result = $conn->prepare("call getItem($item_id)");
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
	        <h4><a href="#">><?php echo $itemName ?></a></h4>
	        <button class="addToCart">Add to cart</button>
	        <p><?php echo $itemDesc ?></p>
	    </div>
	</div>
<?php } ?>