<?php

include "config.php";

     if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phone-number"];
        $username = $_POST["username"];
        $guards = $_POST["guards"];
        $address = $_POST["address"];
        $agreementfile = $_FILES["agreementfile"]["name"];
        $deploymentfile = $_FILES["deploymentfile"]["name"];
        $contractfile = $_FILES["contractfile"]["name"];
        $imagetmp = $_FILES["agreementfile"]["tmp_name"];
        $imagetmp1 = $_FILES["contractfile"]["tmp_name"];
        $imagetmp2 = $_FILES["deploymentfile"]["tmp_name"];
        $imagefolder = "./uploaded-file/".  $agreementfile;
        $imagefolder1 = "./uploaded-file/".  $contractfile;
        $imagefolder2 = "./uploaded-file/".  $deploymentfile;
        $password = "07062094716";

        $sqli = "INSERT INTO client_panel  (name, email, phonenumber, username,
        agreementfile, deployment, contractfile, guards, address)
        VALUES('$name', '$email', '$phonenumber', '$username', '$agreementfile', '$deploymentfile',
         '$contractfile', '$guards', '$address')";
        $result = mysqli_query($conn, $sqli);

      
        if( move_uploaded_file($imagetmp, $imagefolder)){
          header("location: adminpage.php");
        }
        if( move_uploaded_file($imagetmp1, $imagefolder1)){
            header("location: adminpage.php");
          }
          if( move_uploaded_file($imagetmp2, $imagefolder2)){
            header("location: adminpage.php");
          }
        else{
          echo "<h3> Image failed to upload</h3>";
        }
      }
      
  $conn->close();
?>