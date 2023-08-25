<?php
if(isset($_POST["submit"])){
 
session_start();
// declaring the session mechanism
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location:login-applicant.php");
}
include 'config.php';



$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

  $sql = "SELECT * FROM admin_panel WHERE email = '$email' AND password = '$password' limit 1 ";
  
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) >0){
 
          $_SESSION["loggedin"] = true;
          $_SESSION["email"] = $email; 
          $_SESSION["start"] = time();
          $_SESSION["expire"] =  $_SESSION['start'] + (30000000);
          header("location:adminpage.php");
          while($row = mysqli_fetch_assoc($result)){
           $_SESSION["name"] = $row["name"];
         }
        
}

$conn->close();

}
?>

<!DOCTYPE html>
 
  <head>
<title>Admin Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./assets/css/home.css">
<link rel="stylesheet" href="./assets/css/bootstrap.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
<link rel="shortcut icon" href="./assets/img/IMG-20230221-WA0004.jpg" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>              
  </head>
  <style>
      
     @import url(./assets/css/login-applicant.css);
      
  </style>
  <body>
  <div class="sticky">
            <div class="main">
                <div class="logo">
                    <a href="https://mastereyesecurityservicesltd.com.ng"><img class="image" src="./assets/img/IMG-20230221-WA0004.jpg" alt="logo"></a>
                </div>
                <div class="nav-bar">
                    <a class="index" href="https://mastereyesecurityservicesltd.com.ng"><i class="fas fa-home"></i>   Home</a>
                    <a class="contactus" href="./index.html"><i class="fas fa-mouse"></i>   Apply</a>
                    <a class="contactus" href="https://mastereyesecurityservicesltd.com.ng/contact/"><i class="fas fa-id-card"></i>   Contact Us</a>
                    <a class="aboutus" href="https://mastereyesecurityservicesltd.com.ng/about/"><i class="fas fa-user-tie"></i>   About Us</a>
                </div>
                
                    <div class="login">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-sign-in"></i>  Login
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="employee-login.php"><i class="fas fa-unlock"></i> As an Employee</a></li>
                              <li><a class="dropdown-item" href="admin.php"> <i class="fas fa-lock"></i>  As Admin</a></li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
      
      <div class="content-main">
          <h1 class="header">Login as the Admin</h1>
          <hr class="line">
          <div class="header-1">
              <h3>Login with your details</h3>
          </div>
          <div class="content-container">
              <div class="content-image">
                  <img class="image-login" src="./assets/img/330010e0261fb43fae69e7ac8dc3df7f.jpg" alt="Security man">
              </div>
              <div class="content-signup">
                  
                  <form action="admin.php" method="POST">
                      <div class="wrapper">
                          
                          <label for="email-address"><b>Email:</b></label>
                          <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                          title="login with a valid email" class="form-control" id="email-address" 
                          autocomplete="on"  placeholder="e.g example123@gmail.com" name="email"  required aria-required="true">
                          <?php
                              
                          ?>
                          <br><br>
                          <label for="password"><b>Password:</b></label>
                         <div class="input-container">
                          <input type="password"  class="form-control" name="password" id="password"  autocomplete="on" placeholder="Please enter your password"
                           required>
                         </div>
                         
                         <br>
                          <button  type="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Proceed to login  <i class="fas fa-sign-in-alt">  </i>
                          </button>
                          <br>
                          <br>
                          
                      </div>
                          </div>
                      </div>
                  </form>
              </div>
              </div> 
          </div> 
      </div>
             
      <footer class="footer1">
            <br>
            <br>
            <br>
            <div class="container text-left">
                <div class="row">
                  <div class="col">
                    <span class="columns">ADDRESS</span>
                    <br>
                    <h4 class="columns">JOS OFFICE:</h4>
                    <p>37, J.B. HOUSE CHURCH STREET</p>
                    <p>JOS, PLATEAU STATE</p>
                    <br>
                    <h4 class="columns">ABUJA OFFICE:</h4>
                    <p>SUIT 215, PLOT 630, CADASTRAL ZONE A09</p>
                    <p>DURUMI-AREA 1, GARKI, FCT-ABUJA</p>
                  </div>
                  <div class="col">
                    <span class="columns">OUR MISSION</span>
                    <p class="inner-mission">
                        <br>
                        <i>Defining your safety and security</i>
                    </p>
                  </div>
                  <div class="col">
                    <span class="columns">CONTACT US</span>
                    <br>
                    <h4 class="columns">Contact:</h4><p><a href="tel:+2347062094716">07062094716</a> <span>  |  </span> <a href="tel:+2349122749660">09122749660</a></p>
                <h4 class="columns">E-mail:</h4><p><a href="mailto:mastereyeservices@gmail.com">mastereyeservices@gmail.com</a></p>
                <h4 class="columns">Website:</h4><a href="https://mastereyesecurityservicesltd.com.ng" target="_blank" rel="noopener noreferrer">mastereyesecurityservicesltd.com.ng</a>
                  </div>
                </div>
              </div>
            <div>
            </div>
            <style>
                .social{
                    display:flex;
                    column-gap: 20px;
                    justify-content: space-between;
                    width: 200px;
                   margin-left:520px;
                }
                .fa-facebook, .fa-linkedin, .fa-whatsapp{
                    font-size: 40px;
                    
                }
                .fa-facebook{
                    color: #3b5998;
                }
                .fa-linkedin{
                    color:#0072b1;
                }
                .fa-whatsapp{
                    color:#075e54;
                }
            </style>
            <div class="copy">
                <span class="licence">MASTER-EYE SECURITY SERVICES LTD. Powered by Github .</span>
                <br>
               <div class="social">
               <a href="https://www.facebook.com/profile.php?id=100083360731755&mibextid=ZbWKwL" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
                <a href="https://www.linkedin.com/in/elisha-adamu-505552134/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i></i></a>
                <a href="tel:07062094716" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></i></a>
               </div>

          
        </footer>
      <script type="text/javascript" src="./assets/js/apply.js">
      </script>
      <script src="https://js.paystack.co/v1/inline.js"></script> 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
  <script type="text/javascript"></script>
  </body>
</html>
    
