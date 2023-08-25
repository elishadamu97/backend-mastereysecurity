<?php

include "config.php";

 
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phone-number"];
        $username = $_POST["username"];
        $rank = $_POST["rank"];
        $guardsalary = $_POST["guardsalary"];
        $dateofdischarge = $_POST["dateofdischarge"];
        $address = $_POST["address"];
        $appointmentletter = $_FILES["appointmentletter"]["name"];
        $termsconditions = $_FILES["termsconditions"]["name"];
        $guarantor = $_FILES["guarantor"]["name"];
        $imagetmp = $_FILES["appointmentletter"]["tmp_name"];
        $imagetmp1 = $_FILES["guarantor"]["tmp_name"];
        $imagetmp2 = $_FILES["termsconditions"]["tmp_name"];
        $imagefolder = "./uploaded-file/".  $appointmentletter;
        $imagefolder1 = "./uploaded-file/".  $guarantor;
        $imagefolder2 = "./uploaded-file/".  $termsconditions;

        $sqli = "INSERT INTO employee_panel  (name, email, phonenumber, username, rank,
        appointmentletter, termsconditions, guarantor, guardsalary, date_of_discharge, address)
        VALUES('$name', '$email', '$phonenumber', '$username', '$rank',
        '$appointmentletter', '$termsconditions',
        '$guarantor', '$guardsalary', '$dateofdischarge', '$address')";

        $result = mysqli_query($conn, $sqli);

      
        if( move_uploaded_file($imagetmp, $imagefolder)){
          header("location:employee_reg.php");
        }
        if( move_uploaded_file($imagetmp1, $imagefolder1)){
            header("location:employee_reg.php");
          }
          if( move_uploaded_file($imagetmp2, $imagefolder2)){
            header("location:employee_reg.php");
          }
        else{
          echo "<h3> Image failed to upload</h3>";
        }
      
    
  $conn->close();
?>