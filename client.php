<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin.php");
    exit;
}
else{
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        echo "your login time has expired";
        session_destroy();
       
    }
}
    include 'config.php';
  $username = "2245";
    $sql_client = "SELECT * FROM client_panel WHERE username = '$username'";

    $result_admin = mysqli_query($conn, $sql_client);

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
    <script src="./assets/js/chart-js-config.js"></script>
    <title>Applicants Page</title>
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
                <a href="adminpage.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-chart-bar"></i> Charts </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="chartjs.html" class="dash-nav-dropdown-item">Chart.js</a>
                    </div>
                </div>
                <div class="dash-nav-dropdown ">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-cube"></i> Statistics </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="applicant.php" class="dash-nav-dropdown-item">Applicants</a>
                        <a href="forms.html" class="dash-nav-dropdown-item">Employees</a>
                        <a href="admin-client.php" class="dash-nav-dropdown-item">Clients</a>
                        <a href="tables.html" class="dash-nav-dropdown-item">Tables</a>
                        
                    </div>
                </div>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-file"></i> Layouts </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="blank.html" class="dash-nav-dropdown-item">Blank</a>
                        <a href="content.html" class="dash-nav-dropdown-item">Content</a>
                        <a href="adminlogout.php" class="dash-nav-dropdown-item">Logout</a>
                      
                    </div>
                </div>
               
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
                <form class="searchbox" action="#!">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <input type="text" class="searchbox-input" placeholder="type to search">
                </form>
                <div class="tools">
                    
                    </a>
                    
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Profile</a>
                            <a class="dropdown-item" href="adminlogout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <div>   
    </div>
  
    <main class="dash-content">
        <h1><b>Applicants Dashboard</b></h1>
        <br>
        <span><h4>Welcome!!  <?php   
        $row1 = mysqli_fetch_assoc($result_admin);
        echo $row1["username"];
        
        ?></h4> <br> This is the applicant dashboard. 
    In here you can observe the growth of Revenue and how many people has applied for a Job </span>
                <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-6">
                            
                        </div>
                        <div class="col-xl-6">
                            
                        </div>
                        
                </div>
        </main>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./assets/js/spur.js"></script>
</body>

</html>