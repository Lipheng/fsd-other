<?php
    
    include_once "dbcon.php";

    if (isset($_POST['career-submit'])) {
        $name = $_POST['applicant-name'];
        $date = $_POST['career-date'];
        $mobileNo = $_POST['career-mobile-no'];

        $sql = "INSERT INTO career VALUES (DEFAULT, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $date, $mobileNo]);
    }

    header('Location:index.php');

?>