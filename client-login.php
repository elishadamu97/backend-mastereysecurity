<?php
if(isset($_POST["submit"])){
 
session_start();
// declaring the session mechanism
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location:client-login.php");
}
include 'config.php';

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

  $sql = "SELECT * FROM client_login_panel WHERE username = '$username' AND password = '$password' limit 1 ";
  
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) >0){
      session_start();
          $_SESSION["loggedin"] = true;; 
          $_SESSION["start"] = time();
          $_SESSION["expire"] =  $_SESSION['start'] + (30000000);
          header("location:client.php");

          $row = mysqli_fetch_array($result);

           $_SESSION["username"] = $row["username"];
         
        
}

$conn->close();

}
?>

<!DOCTYPE html>
 
  <head>
<title>Client Login Page</title>
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
     .header{
            text-align: center;
            margin: 20px 0px 30px 0px;
            color: rgb(11, 129, 184);
        }
        .line{
            margin: 0px 20px 0px 20px;
            font-size: 2px;
            border: 1px solid rgb(155, 198, 219);
            box-shadow: 10px 10px 20px rgb(204, 226, 255);
        
        }
        .content-main{
            box-shadow: 10px 10px 20px rgb(157, 199, 253);
            width: 1100px;
            height: 100%;
            border-radius: 10px;
            border-left: 1px solid rgb(103, 186, 241);
            border-top: 1px solid rgb(103, 186, 241);
            margin-left:86px;
            margin-bottom: 80px;
        
        }
        .header-1{
            margin-left: 20px;
            color: rgb(11, 129, 184);
        
        }
        .input-container{  
            display: flex;
            width: 100%;
            margin-bottom: 15px;
            position: relative;
          }
          input:invalid{
            border: 2px solid rgb(221, 20, 20)
            !important;
        }
        input:placeholder-shown{
         border: 1px solid rgb(47, 167, 204)
          !important;
        }
        input:valid{
            border: 2px solid rgb(25, 201, 25)
              !important;
          }
          
        
        #toggle{
              position: absolute;
              transform: translate(0, -50%);
              margin-top: 19px;
              margin-left: 330px;
              font-size: 20px;
              cursor: pointer;
          }
          #toggleCon{
            position: absolute;
              transform: translate(0, -50%);
              margin-top: 30px;
              margin-left: 330px;
              font-size: 20px;
              cursor: pointer;
          }
        .content-container{
            display: flex;
            flex-direction: row-reverse;
            column-gap: 0px;
            margin: 10px 0px 0px 0px;
            justify-content: center;
            justify-content: space-between;    
        }
        .content-image{
            margin-bottom: 50px;
            margin-right: 0px;
            margin-right: 0px;
        }
        .image-signup{
            width: 100%;
            height: 100%;
        }
        .content-signup{
            margin-top: 100px;
            margin-left: 50px;  
            flex-grow: 1;
            margin-right: 0px;
        }
        
      
  </style>
  <body>
  <div class="sticky">
            <div class="main">
                <div class="logo">
                    <a href="https://mastereyesecurityservicesltd.com.ng"><img class="image" src="./assets/img/IMG-20230221-WA0004.jpg" alt="logo"></a>
                </div>
                <div class="nav-bar">
                    <a class="index" href="https://mastereyesecurityservicesltd.com.ng"><i class="fas fa-home"></i> Home</a>
                    <a class="contactus" href="./index.html"><i class="fas fa-mouse"></i>Apply</a>
                    <a class="contactus" href="https://mastereyesecurityservicesltd.com.ng/contact/"><i class="fas fa-mouse"></i> Contact Us</a>
                    <a class="aboutus" href="https://mastereyesecurityservicesltd.com.ng/about/"><i class="fas fa-user-tie"></i> About Us</a>
                </div>
                
                    <div class="login">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-sign-in"></i>  Login
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="./login-applicant.php"><i class="fas fa-user-md"></i>  As an applicant</a></li>
                              <li><a class="dropdown-item" href="./employee-login.php"><i class="fas fa-unlock"></i> As an Employee</a></li>
                              <li><a class="dropdown-item" href="./admin.php"> <i class="fas fa-lock"></i>  As Admin</a></li>
                              <li><a class="dropdown-item" href="./client-login.php"> <i class="fas fa-lock"></i>  Clientte</a></li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
      <div class="content-main">
          <h1 class="header">Login as a Client</h1>
          <hr class="line">
          <div class="header-1">
              <h3>Login with your details</h3>
          </div>
          <div class="content-container">
              <div class="content-image">
                  <img class="image-login" src="./assets/img/Login.jpg" alt="Security man">
              </div>
              <div class="content-signup">
                  
                  <form action="client-login.php" method="POST">
                      <div class="wrapper">
                          
                          <label for="username"><b>Username:</b></label>
                          <input type="text" 
                          title="login with a valid username" class="form-control" id="username"
                          autocomplete="on"  placeholder="MESSL12345" name="username"  required aria-required="true">
                          <?php
                              
                          ?>
                          <br><br>
                          <label for="password"><b>Password:</b></label>
                         <div class="input-container">
                          <input type="password" 
                          title="" class="form-control" name="password" id="password"  autocomplete="on" placeholder="Please enter your password"
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
                    <h4 class="columns">Contact:</h4><p>091228455445, 09122749660</p>
                    <h4 class="columns">E-mail:</h4><p>mastereyeservicesltd@aol.com</p>
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
    
