<?php
    $result = $conn->prepare("call getItemList");
    $result->execute();
    if (!isset($_GET['categoryID'])) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $itemID = $row["itemID"];
            $imgPath = $row["itemImgPath"];
            $itemName = $row["itemName"];
            $itemDesc = $row["itemDescription"];
            $itemPrice = $row["itemPrice"]; 
        ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <a href=<?php echo "item.php?itemID=$itemID" ?> class="displayItem">
                <div class="thumbnail">
                    <div class="imageResizer">
                        <img src="<?php echo $imgPath ?>">
                    </div>
                    <div class="caption">
                        <h4 class="pull-right"><?php echo "$".$itemPrice ?></h4>
                        <h4><?php echo $itemName ?></h4>
                        <p><?php echo $itemDesc ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
    <?php } else {
        $catID = $_GET['categoryID'];
        $result = $conn->prepare("call getCategoryItem($catID)");
        $result->execute();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $itemID = $row["itemID"];
            $imgPath = $row["itemImgPath"];
            $itemName = $row["itemName"];
            $itemDesc = $row["itemDescription"];
            $itemPrice = $row["itemPrice"]; ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <a href=<?php echo "item.php?itemID=$itemID" ?> class="displayItem">
                <div class="thumbnail">
                    <div class="imageResizer">
                        <img src="<?php echo $imgPath ?>">
                    </div>
                    <div class="caption">
                        <h4 class="pull-right"><?php echo "$".$itemPrice ?></h4>
                        <h4><?php echo $itemName ?></h4>
                        <p><?php echo $itemDesc ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
<?php } ?>
        