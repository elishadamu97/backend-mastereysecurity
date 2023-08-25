<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/spur.css">
    <link rel="shortcut icon" href="./assets/img/IMG-20230221-WA0004.jpg" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/chart-js-config.js"></script>
<?php
session_start();
    include_once("config.php");
      ?>
          <style>
      table, th, td {
    border-collapse: collapse;
    padding: 0px 20px 20px 20px;
}
th, td{
    padding: 15px;
    text-align: center;
}
tr:nth-child(even){
    background-color: rgb(191, 225, 255);
    font-size: 12px;
    font-weight: bold;
}
tr:nth-child(odd){
    background-color: rgb(191, 255, 255);
    font-size: 12px;
    font-weight: bold;
}
th{
    background-color: rgb(80, 166, 223);
    font-size: 15px;
}
.row{
    margin: 50px 20px 0px 20px !important;
}
    </style>
    
    <center>
    <br>
    <br>
    <h1>Searched Word: <b><?php echo $_POST["search"]; ?></b></h1>
    <br>
    <br>
           <table>
        <tr> 
            <th>ID</th>           
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Username</th>
            <th>Contract form</th>
            <th>Deployment</th>
            <th>Request form</th>
            <th>Number of Guard</th> 
            <th>Date Registered</th>         
        </tr>
        <tr>
            <?php
              $search = $_POST["search"];
              $result = mysqli_query($conn, "SELECT * FROM client_panel WHERE name LIKE '{$search}%' OR phonenumber LIKE '{$search}%' ");
                 if(mysqli_num_rows($result)> 0){
                     while($row = mysqli_fetch_assoc($result)){
            ?>
            <td><?php echo $row["id"];   ?></td>
            <td><?php echo $row["name"];  ?></td>
            <td><?php echo $row["email"];   ?></td>
            <td><?php echo $row["phonenumber"];   ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td> <a class="form" href="./uploaded-file/<?php  echo $row["agreementfile"];?>   " download=""><button class="btn btn-success"> <i class="fas fa-download"></i></button></a> </td>
            <td> <a class="form" href="./uploaded-file/<?php  echo $row["deployment"];?>   " download=""><button class="btn btn-success"> <i class="fas fa-download"></i></button></a> </td>
            <td> <a class="form" href="./uploaded-file/<?php  echo $row["contractfile"];?>   " download=""><button class="btn btn-success"> <i class="fas fa-download"></i></button></a> </td>
            <td><?php echo $row["guards"];   ?></td>
            <td><?php echo $row["date_registered"];   ?></td>
        </tr>      
   
        </tr>
        <?php
        
            }
        
        }
        else {
            echo "<p style='color:red'>User not found...</p>";
          }
        ?>
      
    </table>
 
</center>
  
       