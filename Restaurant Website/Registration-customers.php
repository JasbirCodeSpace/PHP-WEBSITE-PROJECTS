<?php
error_reporting(0);
session_start();
require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");

// REGISTER USER
try{

  if(isset($_POST['reg_user']) && !empty($_POST['reg_user'])){
  // echo $_POST["submit"];
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pswrd_1= mysqli_real_escape_string($db, $_POST['password1']);
$pswrd_2 = mysqli_real_escape_string($db, $_POST['password2']);
$add_line_1=mysqli_real_escape_string($db, $_POST['address_line_1']);
$add_line_2=mysqli_real_escape_string($db, $_POST['address_line_2']);
$city=mysqli_real_escape_string($db, $_POST['city']);
$zip_code=mysqli_real_escape_string($db, $_POST['zip_code']);
$contact=mysqli_real_escape_string($db, $_POST['contact']);
$preferred_food=mysqli_real_escape_string($db, $_POST['preferred_food']);


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customer WHERE contact='$contact' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "User already exists with the contact no. "+$contact);
    }

    if ($user['email'] === $email) {
      array_push($errors, "User already exists with the Email id "+$email);
    }
  }

  // Finally, register user if there are no errors in the form
  else{
    // $password = md5($password_1);//encrypt the password before saving in the database
$password = $password_1;
    $query = "INSERT INTO customer (name, email, password,add_line_1,add_line_2,city,zip_code,contact,preferred_food) 
          VALUES('$username', '$email', '$password','$add_line_1','$add_line_2','$city','$zip_code','$contact','$preferred_food')";
    mysqli_query($db, $query);
    // $_SESSION['username'] = $username;
    // $_SESSION['success'] = "You are now logged in";
    header('location: Login-customers.php');
  }
}else{
  // echo 'error';
}
}

catch(Exception $e) {
  // echo 'Message: ' .$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration | Customers</title>
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
                    <li id='menu-link'><a href="menu.php">Menu</a></li>
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
    <div id="reservation" class="reservations-main pad-top-100">
      <div class="container">
        <div class="row">
          <div class="form-reservations-box">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2 class="block-title text-center">
                  Customer Registration            
                </h2>
                <h4><a class="text-center" href="Registration-restaurant.php">Register as Restaurant here</a></h4>
              </div>
              <!-- <h4 class="form-title">BOOKING FORM</h4> -->
              <p>PLEASE FILL OUT ALL REQUIRED* FIELDS. THANKS!</p>
              <form method="POST" class="reservations-box" action="Registration-customers.php">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="text" name="username" placeholder="Name *" required="required" data-error="Name is required.">
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="email" name="email" placeholder="E-Mail ID *" required="required" data-error="E-mail id is required.">
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="password" name="password1" placeholder="Password *" required="required" data-error="Password is required.">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="password" name="password2" placeholder="Retype Password *" required="required" data-error="Retype password here">
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Address</label>
                  <div class="form-box">
                    <input type="text" name="address_line_1" placeholder="Address Line 1*" required="required">
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-box">
                    <input type="text" name="address_line_2" placeholder="Address Line 2">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input type="text" name="city" placeholder="City*" required="required">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input name="zip_code" placeholder="Zip Code*" type="text" pattern="[0-9]{6}" data-error="Zip Code must be numeric and of 6 digits" required="required">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="text" name="contact" placeholder="contact no. *">
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <select name="preferred_food" class="selectpicker" required="required">
                      <option selected disabled>preferred food *</option>
                      <option>Vegetarian</option>
                      <option>Non-Vegetarian</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 button">
                  <div class="reserve-book-btn text-center">
                    <button class="hvr-underline-from-center" type="submit" value='submit' name="reg_user">Register</button>
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