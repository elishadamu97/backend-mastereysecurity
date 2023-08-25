<?php
require "config.php";
$username = $_POST["username"];
$date_sent = $_POST["date_sent"];

$payment_slip = $_FILES["payment_slip"]["name"];
$imagetmp = $_FILES["payment_slip"]["tmp_name"];
$imagefolder = "./uploaded-file/".  $payment_slip;

$sqli = "INSERT INTO employee_form (username, payment_slip, date_sent)
        VALUES('$username', '$payment_slip', '$date_sent')";

$result = mysqli_query($conn, $sqli);

if( move_uploaded_file($imagetmp, $imagefolder)){
    header("location: employee_payment.php");
  }
  else{
    echo "<h3> Image failed to upload</h3>";
  }


$conn->close();
?>