<?php

session_start();
include 'config.php';
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: employee-login.php");
    exit;
}
else{
    $now = time(); // Checking the time now when home page starts.
   
    if ($now > $_SESSION['expire']) {
        echo "your login time has expired";
        session_destroy();
    }
}   
    $username = $_SESSION["username"];
    $sql = "SELECT * FROM employee_panel WHERE username  = '$username' ";

    $result_employee = mysqli_query($conn, $sql); 

    while($row_employee = mysqli_fetch_assoc($result_employee)){
             $_SESSION["name"] = $row_employee["name"];
             $_SESSION["rank"] = $row_employee['rank'];
             $_SESSION["appointmentletter"] = $row_employee['appointmentletter'];
             $_SESSION["termsconditions"] = $row_employee['termsconditions'];
             $_SESSION["guarantor"] = $row_employee['guarantor'];
             $_SESSION["guardsalary"] = $row_employee['guardsalary'];
             $_SESSION["date_of_discharge"] = $row_employee['date_of_discharge'];
        } 

?>
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
   
    <title>Employee Page</title>
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
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="index.html" ><img src="./assets/img/IMG-20230221-WA0004.jpg" width="50px" height="50px" ></a>
            </header>
            <br>
            <br>
            <nav class="dash-nav-list">
                <a href="employee-profile.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
                    <a href="employee_payment_slip.php" class="dash-nav-item">
                    <i class="fas fa-money-bill-wave"></i> Payments Slips </a>
                
                <a href="employee_logout.php" class="dash-nav-item">
                <i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
                </a>
                <form class="searchbox" action="#" method="POST">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <input type="text" name="search" class="searchbox-input" id="search" placeholder="type to search">
                </form>
                <div class="tools">
                    
                    </a>
                   
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Profile</a>
                            <a class="dropdown-item" href="employee_logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <div>   
    </div>
    <main class="dash-content">
        <h1><b>Employee Dashboard</b></h1>
        <br>
        
       
       
        <span><h4>Welcome!!   <b><?php echo $_SESSION["name"] ?> <i class="fas fa-smile-wink"></i></b></h4> <br> <h5>This is where you can check your documents and payment slip.</h5> </span>
        <hr>
        <br>
                <div class="container-fluid">
                <h4 style="color: grey;">Rank:<h5 style="color: blue;"><?php echo $_SESSION["rank"] ?></h5></h4>  
                <br>
                <br>
                <h4 style="color: grey;">Salary:<h5 style="color: blue;"><?php echo $_SESSION["guardsalary"] ?>  naira</h5></h4>
                <br>
                <br>
                <h4 style="color: grey;">Date of Discharge: <h5 style="color: blue;"> <?php echo $_SESSION["date_of_discharge"] ?></h5></h4>  
                <hr>
                <h2 style="color: green">Appointment Letter</h2>
                <br>
                <embed src="./uploaded-file/<?php echo $_SESSION["appointmentletter"] ?>"  width="50%" height="50%" />
                <hr>
                <h2 style="color: green">Terms and Conditions</h2>
                <br>
                <embed src="./uploaded-file/<?php echo $_SESSION["termsconditions"] ?>" width="50%" height="80%" />
                <hr>
                <h2 style="color: green">Guarantors form</h2>
                <br>
                <embed src="./uploaded-file/<?php echo $_SESSION["guarantor"] ?>" width="50%" height="80%" />
                
        </main>
        

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./assets/js/spur.js"></script>
     
    
</body>

</html>