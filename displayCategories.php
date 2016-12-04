<?php
    $result = $conn->prepare("SELECT * FROM categories");
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $catName = $row["categoryName"]; ?>
        <a href="#" class="list-group-item"><?php echo $catName ?></a>
<?php } ?>