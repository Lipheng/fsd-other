<?php

include_once "dbcon.php";  

//add booking

if (isset($_POST['add-booking'])) {
    $customerName = $_POST['add-customer-name'];
    $noPeople = $_POST['add-no-people'];
    $noMeal = $_POST['add-no-meal'];
    $date = $_POST['add-date'];
    $mobileNo = $_POST['add-mobile-no'];
    $email = $_POST['add-email'];
    $comment = $_POST['add-comment'];

    //convert str to int
    $noPeople = (int)$noPeople;
    $noMeal = (int)$noMeal;

    $sql = "INSERT INTO catering VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customerName, $noPeople, $noMeal, $date, $mobileNo, $email, $comment]);
}

//update booking

if (isset($_POST['modal-ud-booking'])) {
    $udBookingId = $_POST['modal-ud-id'];
    $udNoPeople = $_POST['modal-ud-no-people'];
    $udNoMeal = $_POST['modal-ud-no-meal'];
    $udDate = $_POST['modal-ud-date'];
    $udMobileNo = $_POST['modal-ud-mobile-no'];
    $udEmail = $_POST['modal-ud-email'];
    $udComment = $_POST['modal-ud-comment'];

    //convert str to int
    $udBookingId = (int)$udBookingId;
    $udNoPeople = (int)$udNoPeople;
    $udNoMeal = (int)$udNoMeal;

    $sql = "UPDATE catering SET no_people = ?, no_meal = ?, date = ?, mobile_no = ?, email = ?, comment = ? WHERE booking_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$udNoPeople, $udNoMeal, $udDate, $udMobileNo, $udEmail, $udComment, $udBookingId]);
}

//delete booking

if (isset($_POST['ud-delete-booking'])) {
    $udBookingId = $_POST['id-holder'];
    
    //convert str to int
    $udBookingId = (int)$udBookingId;

    $sql = "DELETE FROM catering WHERE booking_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$udBookingId]);
}

header('Location:index.php');

?>