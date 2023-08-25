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
    $sql = "SELECT * FROM client_panel";
    $sql_admin = "SELECT * FROM admin_panel";

    $sql_client = "SELECT  COUNT(id) AS id FROM client_panel";

    $result_admin = mysqli_query($conn, $sql_admin);
    $result_client = mysqli_query($conn, $sql_client);

  while($row_admin = mysqli_fetch_assoc($result_admin)){
    $_SESSION['admin'] =  $row_admin['name'];
  }

  while($row_client = mysqli_fetch_assoc($result_client)){
    $_SESSION['client'] =  $row_client['id'];
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
   
    <title>Client Page</title>
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
                    <a href="employee_payment.php" class="dash-nav-item">
                    <i class="fas fa-shopping-cart"></i> Payments </a>
                <div class="dash-nav-dropdown ">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-cube"></i> Statistics </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="applicant.php" class="dash-nav-dropdown-item">Applicants</a>
                        <a href="admin-employee.php" class="dash-nav-dropdown-item">Employees</a>
                        <a href="employee_reg.php" class="dash-nav-dropdown-item">Employees Reg.</a>
                        <a href="admin-client.php" class="dash-nav-dropdown-item">Clients</a>
                        
                        
                    </div>
                </div>
                <a href="logout.php" class="dash-nav-item">
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
                <form class="searchbox" action="client-search.php" method="POST">
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
                            <a class="dropdown-item" href="adminlogout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <div>   
    </div>
    <main class="dash-content">
        <h1><b>Client Dashboard</b></h1>
        <br>
        <span><h4>Welcome!!  <?php echo "<b>" . $_SESSION["admin"] .'   <i class="fas fa-smile-wink"></i>' . "</b>"?></h4> <br> This is the Clientte dashboard. 
    In here you can observe the growth of Revenue and how many Clients are registered. </span>
                <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-6">
                            <div class="stats stats-primary">
                                <h3 class="stats-title"> Sign ups </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="stats-data">
                                        <h5 id="applied-candidates"><?php echo $_SESSION['client'] . "<span> Clients</span>" ?></h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="stats stats-success ">
                                <h3 class="stats-title"> Revenue </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                    <i class="fas fa-dollar-sign"></i>                      
                                </div>
                                    <div class="stats-data">
                                    <h5 id="revenue-generated"><?php echo $_SESSION['client'] * 100000 . "<span> Naira</span>" ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </div>
        </main>
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
              $result = mysqli_query($conn, $sql); 
              if(mysqli_num_rows($result) > 0){
           while( $row = mysqli_fetch_assoc($result)){
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
    <?php
           }
              }
    ?>
    <div id="output">

    </div>
       

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./assets/js/spur.js"></script>
     
    
</body>

</html>