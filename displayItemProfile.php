<?php 
    $result = $conn->prepare("SELECT * FROM item where itemID = $item_id");
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
	        <p><?php echo $itemDesc ?></p>
	        <div class="addCartButton">Add to cart</div>
	    </div>
	</div>
<?php } ?>