<?php
include 'config.php';

$fname = mysqli_real_escape_string($conn, $_GET['fname']);
$surname = mysqli_real_escape_string($conn, $_GET['surname']);
$email = mysqli_real_escape_string($conn, $_GET['email']);
$phonenumber = mysqli_real_escape_string($conn, $_GET['phonenumber']);
$stateoforigin = mysqli_real_escape_string($conn, $_GET['stateoforigin']);
$amount = "2000";
$address = mysqli_real_escape_string($conn, $_GET['address']);
$reference = mysqli_real_escape_string($conn, $_GET['sent_to_database']);

$_SESSION["fname"] = $fname;

mysqli_query($conn, "INSERT INTO candidate_table(firstname, surname, email, phonenumber, state, amount, address, reference)
 VALUES ('".$fname."', '".$surname."', '".$email."', '".$phonenumber."', '".$stateoforigin."','".$amount."', '".$address."', '".$reference."' )");

mysqli_close($conn)
?>