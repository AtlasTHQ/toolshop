<?php
    $result = $conn->prepare("call CategoryList");
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $catID = $row["categoryID"];
        $catName = $row["categoryName"]; ?>
        <a href="<?php echo "index.php?categoryID=$catID" ?>" class="list-group-item"><?php echo $catName ?></a>
<?php } ?>