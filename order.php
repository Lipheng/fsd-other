<?php

include_once "dbcon.php";  

//customer_order

if (isset($_POST['order-total-submit'])) {
    $orderTotal = $_POST['order-total'];

    $sql = "INSERT INTO customer_order VALUES (DEFAULT, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$orderTotal]);
}

header('Location:index.php');

?>