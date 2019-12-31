<?php
error_reporting(0);
session_start();
require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");

   
   if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['login_user']) && !empty($_POST['login_user'])) {
      // username and password sent from form 
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      $sql = "SELECT * FROM customer WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         // session_register("myusername");
         $_SESSION['login_user_name'] = $row['name'];
         $_SESSION['login_user_email'] = $row['email'];
         $_SESSION['login_type'] = 'Customer';

         
         header("location: menu.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | Customer</title>

        <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="css/colors/orange.css" />

    <!-- Modernizer -->
    <script src="js/modernizer.js"></script>
    <style type="text/css">
        .button{
            padding-bottom: 30px;
        }
    </style>
</head>
<body>
  <div id="loader">
      <div id="status"></div>
    </div>
    <div id="site-header">
      <header id="header" class="header-block-top">
        <div class="container">
          <div class="row">
            <div class="main-menu">
              <!-- navbar -->
              <nav class="navbar navbar-default" id="mainNav">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <div class="logo">
                    <a class="navbar-brand js-scroll-trigger logo-header" href="index.html">
                    <h1 style="font-style: bold;color: #fff;padding-top: 20px;">FoodShala</h1>
                    </a>
                  </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
           
                  </ul>
                </div>
                <!-- end nav-collapse -->
              </nav>
              <!-- end navbar -->
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container-fluid -->
      </header>
      <!-- end header -->
    </div>
        <div class="special-menu pad-top-100 parallax" >
    <div class="container">

    <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <div id="reservation" class="reservations-main pad-top-100 pad-bot-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
                        Login as Customer            
                    </h2>
                    <h4><a class="text-center" href="Login-restaurant.php">Login as Restaurant here</a></h4>
                        </div>
              <!--           <h4 class="form-title">BOOKING FORM</h4>
                        <p>PLEASE FILL OUT ALL REQUIRED* FIELDS. THANKS!</p> -->

                        <form method="post" class="reservations-box" action="Login-customers.php">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-box">
                                    <input type="email" name="email" id="email" placeholder="Email Id *" required="required" data-error="Customer's Email id  is required.">
                                </div>
                            </div>

                            <!-- end col -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-box">
                                    <input type="password" name="password" id="password" placeholder="Password" required="required" data-error="Password is required.">
                                </div>
                            </div>
                            
                            <!-- end col -->

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit" name='login_user'>Login </button>
                                </div>
                            </div>
                            <!-- end col -->
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end reservations-box -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end reservations-main -->

        <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
</body>
</html>