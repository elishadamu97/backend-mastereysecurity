<?php
session_start();
include 'config.php';
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
    

      $sql_client = "SELECT * FROM client_panel";

    $result_client = mysqli_query($conn, $sql_client);
    if(mysqli_num_rows($result_client) > 0 ){
      $row_client = mysqli_fetch_assoc($result_client);
        $_SESSION["name"] = $row_client["name"];
        $_SESSION["email"] = $row_client["email"];
        $_SESSION["phone-number"] = $row_client["phone-number"];
        $_SESSION["address"] = $row_client["address"];
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="./assets/js/chart-js-config.js"></script>
    <title>Settings | Client</title>
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                
                <a href="#" ><img src="./assets/img/IMG-20230221-WA0004.jpg" width="70px" height="70px" style="border-radius: 50%" ></a>
            </header>
            <br>
            <nav class="dash-nav-list">
                <a href="client.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
                <a href="details.php" class="dash-nav-item">
                    <i class="fas fa-home"></i> Details </a>
                <a href="settings.php"   class="active dash-nav-item">
                    <i class="fas fa-home"></i> Settings </a>
                <a href="client-logout.php"  class="dash-nav-item">
                    <i class="fas fa-home"></i> Logout </a>

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
                            <a class="dropdown-item" href="https://mastereyesecurityservicesltd.com.ng">Home</a>
                            <a class="dropdown-item" href="client-logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <style>
                    .setting-container{
                        display: flex;
                        column-gap: 50px
                    }
                    .settings1{
                        flex: 1 1 0px;
                    }
                    .settings2{
                        flex: 1 1 0px;
                    }
                    .btn-success{
                        border-radius: 3px;
                    }
                </style>
                <span><h4>Welcome!!  <?php echo "<b>" . $_SESSION["name"] .'   <i class="fas fa-smile-wink"></i>' . "</b>"?></h4> <br> This is the Settings Page. 
                This page enables you to change your profile email or password </span>
                <form action="settings.php" method="post">
                    <br>
                        <div class="settings1">
                            <label for="fname"><b>Name:</b></label>
                            <input  type="text" class="form-control" disabled value="<?php $_SESSION["name"]?>"  id="fname" name="name" autocomplete="on" placeholder="Example: John" required aria-required="true">
                            <br>
                            <label for="email-address"><b>Email:</b></label>
                            <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            title="login with a valid email" class="form-control" id="email-address" 
                            autocomplete="on"  placeholder="e.g example123@gmail.com" name="email"  value="<?php $_SESSION["name"]?>"   required aria-required="true">
                            <br>
                            <label for="phone-number"><b>Phone Number:</b></label>
                            
                            <input type="tel"  class="form-control" name="phone-number" id="phone-number" autocomplete="on" placeholder="Example: 08012345678"
                            title="Phone Number must be a number" pattern="[0-9]{11}" required>
                        
                        
                            <br>
                           
                            <label class="form-label" for="address"><b>Change Address:</b></label>
                            <textarea class="form-control" height="100px" name="address" id="address"  placeholder="Please enter your Home/Work Address" required></textarea>   
                        </div>
                </form>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./assets/js/spur.js"></script>
</body>

</html>