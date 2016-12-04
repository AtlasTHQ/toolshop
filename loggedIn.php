<?php
    $username = $_SESSION['login_user'];
    $result = $conn->prepare("call getUser($username)");
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $firstNameLoggedIn = $row["firstName"];
        $lastNameLoggedIn = $row["lastName"];
?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo "$firstNameLoggedIn"." "."$lastNameLoggedIn"?></b> <span class="caret"></span></a>
</li>