<?php
session_start();
require "config.php";

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


$sql = "SELECT * FROM client_panel";
$sql_admin = "SELECT * FROM admin_panel";

$sql_client = "SELECT  COUNT(id) AS id FROM client_panel";

$result_admin = mysqli_query($conn, $sql_admin);
$result_client = mysqli_query($conn, $sql_client);

$sql_app = "SELECT  COUNT(id) AS id FROM candidate_table";
$result_app = mysqli_query($conn, $sql_app);

while($row_admin = mysqli_fetch_assoc($result_admin)){
$_SESSION['admin'] =  $row_admin['name'];
}

while($row_client = mysqli_fetch_assoc($result_client)){
$_SESSION['client'] =  $row_client['id'];
} 
while($row_app = mysqli_fetch_assoc($result_app)){
    $_SESSION['candidates'] =  $row_app['id'];
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
    <!-- Latest compiled and minified CSS -->
    <!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="./assets/js/chart-js-config.js"></script>
    
    <title>Employee Payments</title>
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
                <form class="searchbox" action="#!">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <input type="text" class="searchbox-input" placeholder="type to search">
                </form>
                <div class="tools">
                    
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
            
            
            <main class="dash-content">
            <h1><b>Employees Payment Slip</b></h1>
            <br>
            <span><h4>Hello!!  <?php echo "<b>" . $_SESSION["admin"] .'   <i class="fas fa-smile-wink"></i>' . "</b>"?></h4> <br>

                <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-4">
                            <div class="stats stats-primary">
                                <h3 class="stats-title"> Sign ups </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"><?php echo (($_SESSION['client']) + ($_SESSION['candidates']))  ?></div>
                                        <div class="stats-change">
                                            <span class="stats-percentage"></span>
                                            <span class="stats-timeframe">from Lifetime</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-success ">
                                <h3 class="stats-title"> Revenue </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                    <i class="fas fa-dollar-sign"></i></div>
                                    <div class="stats-data">
                                        <div class="stats-number"><?php echo (($_SESSION['client'])*100000 + ($_SESSION['candidates'])*2000)  ?></div>
                                        <div class="stats-change">
                                            <span class="stats-percentage"></span>
                                            <span class="stats-timeframe">from Lifetime</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-secondary">
                                <h3 class="stats-title">Shareholders</h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                    <i class="fas fa-share-alt-square"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">8</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                                       .btn-info, .form-control{
                                            border-radius: 3px;
                                        }
                                        .btn-success{
                                            border-radius: 3px;
                                            margin-top: 20px
                                        }
                                    </style>
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="spur-card-title">Employee Payment</div>
                                </div>
                                <div class="card-body ">
                                   
                                
                                </div>
                                <div class="card-body spur-card-body-chart">
                                    <form action="employee-form.php" method="post" enctype="multipart/form-data">
                                    <label for="payment-slip"><b>Select Employee's Name:</b></label>
                                    <br>
                                    <?php
                                        echo "<select name='username' class='form-select' required id='payment-slip'>";
                                        echo "<option value='' required> Select name of Guard </option>";
                                        $sql = "SELECT * FROM employee_panel";
                                        $result_reg = mysqli_query($conn, $sql);
                                            while($row_reg = mysqli_fetch_assoc($result_reg))
                                            {
                                                echo ("<option value = $row_reg[username]>$row_reg[name] - $row_reg[rank] </option>");
                                            }
                                        
                                        echo "</select>";
                                    ?>
                                    <br>
                                    <br>
                                    <label for="payment_slip"><b>Payment Slip:</b></label>
                                    <input  type="file" class="form-control"   id="payment_slip" name="payment_slip" required aria-required="true">
                                    <br>
                                    <br>

                                    <div class="form-group col-xl-6" > <!-- Date input -->
                                        <label class="control-label" for="date"><b>Date Sent</b></label>
                                        <input class="form-control" id="date" type="date" name="date_sent" placeholder="MM/DD/YYY" type="text"/>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./assets/js/spur.js"></script>
    
</body>

</html>