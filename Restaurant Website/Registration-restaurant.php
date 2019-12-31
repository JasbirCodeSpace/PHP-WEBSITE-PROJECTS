<?php
error_reporting(0);
session_start();
require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");

try{
  if(isset($_POST['reg_user']) && !empty($_POST['reg_user'])){

  $name = mysqli_real_escape_string($db, $_POST['name']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pswrd_1= mysqli_real_escape_string($db, $_POST['password1']);
$pswrd_2 = mysqli_real_escape_string($db, $_POST['password2']);
$add_line_1=mysqli_real_escape_string($db, $_POST['address_line_1']);
$add_line_2=mysqli_real_escape_string($db, $_POST['address_line_2']);
$city=mysqli_real_escape_string($db, $_POST['city']);
$zip_code=mysqli_real_escape_string($db, $_POST['zip_code']);
$contact=mysqli_real_escape_string($db, $_POST['contact']);
$delivery=mysqli_real_escape_string($db, $_POST['delivery']);
$delivery_fee=mysqli_real_escape_string($db, $_POST['delivery_fee']);
$minimum_delivery_amount=mysqli_real_escape_string($db, $_POST['minimum_delivery_amount']);
$free_delivery_amount=mysqli_real_escape_string($db, $_POST['free_delivery_amount']);
$monday_to_friday1=mysqli_real_escape_string($db, $_POST['monday_to_friday_time_1']);
$monday_to_friday2=mysqli_real_escape_string($db, $_POST['monday_to_friday_time_2']);
$saturday1=mysqli_real_escape_string($db, $_POST['saturday_time_1']);
$saturday2=mysqli_real_escape_string($db, $_POST['saturday_time_2']);
$sunday1=mysqli_real_escape_string($db, $_POST['sunday_time_1']);
$sunday2=mysqli_real_escape_string($db, $_POST['sunday_time_2']);



  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM restaurant WHERE contact='$contact' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  echo "hello";
  if ($user) { // if user exists
    if ($user['contact'] === $contact) {
      array_push($errors, "User already exists with the contact no. "+$contact);
    }

    if ($user['email'] === $email) {
      array_push($errors, "User already exists with the Email id "+$email);
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    // $password = md5($pswrd_1);//encrypt the password before saving in the database
    $password = $pswrd_1;
    $monday_to_friday = $monday_to_friday1.'to'.$monday_to_friday2;
    $saturday = $saturday1.'to'.$saturday2;
    $sunday = $sunday1.'to'.$sunday2;
    $query = "INSERT INTO restaurant (email,contact,name,password,description,add_line_1,add_line_2,city,zip_code,delivery,delivery_fee,min_delivery_amount ,free_delivery_amount,monday_to_friday_time,saturday_time,sunday_time) 
              VALUES('$email','$contact','$name','$password','$description','$add_line_1','$add_line_2','$city','$zip_code','$delivery','$delivery_fee','$minimum_delivery_amount','$free_delivery_amount','$monday_to_friday','$saturday','$sunday')";
    
    mysqli_query($db, $query);

    header('location: Login-restaurant.php');
  }
}else{
  
}
}

catch(Exception $e) {
  // echo 'Message: ' .$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration | Restaurants</title>

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
                @media only screen and (max-width: 768px){
            .to-input{
            padding-top:0px;
            }
        }

        @media only screen and (min-width: 768px){
            .to-input{
            padding-top: 42px;
            }
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
    <div id="reservation" class="reservations-main pad-top-100 pad-bot-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
                        Restaurant Registration            
                    </h2>
                    <h4><a class="text-center" href="Registration-customers.php">Register as Customer here</a></h4>
                        </div>
                        <!-- <h4 class="form-title">BOOKING FORM</h4> -->
                        <p>PLEASE FILL OUT ALL REQUIRED* FIELDS. THANKS!</p>

                        <form  method="POST" class="reservations-box" action="Registration-restaurant.php">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="name" id="name" placeholder="Restaurant Name*" required="required" data-error="Restaurant name is required.">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="description" id="description" placeholder="Restaurant Description">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-box">
                                    <input type="email" name="email" id="email" placeholder="Restaurant Email Id">
                                </div>
                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input type="text" name="contact" placeholder="contact no. *">
                  </div>
                </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-box">
                                    <input type="password" name="password1" id="password1" placeholder="Password *">
                                </div>
                            </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-box">
                                    <input type="password" name="password2" id="password2" placeholder="Re-enter Password *">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Address</label>
                                <div class="form-box">
                                    <input type="text" name="address_line_1" id="address_line1" placeholder="Address Line 1*" required="required">
                                </div>
                            </div>

                            <!-- end col -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="address_line_2" id="address_line2" placeholder="Address Line 2">
                                </div>
                            </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="city" id="city" placeholder="City*" required="required">
                                </div>
                            </div>
                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input name="zip_code" id="zip_code" placeholder="Zip Code*" type="text" pattern="[0-9]{6}" data-error="Zip Code must be numeric and of 6 digits" required="required">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Delivery</label>
                                <div class="form-box">
                                    <select name="delivery" id="delivery" class="selectpicker">
                                        <option selected>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Delivery Fee</label>
                                <div class="form-box">
                                    <input name="delivery_fee" id="delivery_fee" placeholder="Rs. 0" type="text">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Minimum Delivery Amount</label>
                                <div class="form-box">
                                    <input name="minimum_delivery_amount" id="delivery_amount" placeholder="Rs. 500" type="text">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Free Delivery Amount</label>
                                <div class="form-box">
                                    <input name="free_delivery_amount" id="free_delivery_amount" placeholder="Rs. 2000" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label style="font-size: 20px;">Hours</label>
                                <br>
                                <label>Monday - Friday from :</label>
                                <div class="form-box">
                                                                        <input type="time" name="monday_to_friday_time_1" id="monday_to_friday_time_1" placeholder="Time" required="required" data-error="Time is required." />
                                </div>
                            </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 to-input">
                                <label>Monday - Friday to :</label>
                                <div class="form-box">
                                                                       <input type="time" name="monday_to_friday_time_2" id="monday_to_friday_time_2" placeholder="Time" required="required" data-error="Time is required." />
                                </div>
                            </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Saturday from :</label>
                                <div class="form-box">
                                                                      <input type="time" name="saturday_time_1" id="saturday_time_1" placeholder="Time" required="required" data-error="Time is required." />
                                </div>
                            </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" class="to-input">
                                <label>Saturday to :</label>
                                <div class="form-box">
                                                                      <input type="time" name="saturday_time_2" id="saturday_time_2" placeholder="Time" required="required" data-error="Time is required." />
                                </div>
                            </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Sunday from :</label>
                                <div class="form-box">
                                                                        <input type="time" name="sunday_time_1" id="sunday_time_1" placeholder="Time" required="required" data-error="Time is required." />
                                </div>
                            </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" class="to-input">
                                <label>Sunday to :</label>
                                <div class="form-box">
                                                                        <input type="time" name="sunday_time_2" id="sunday_time_2" placeholder="Time" required="required" data-error="Time is required." />
                                </div>
                            </div>
<!--                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="date-picker" id="date-picker" placeholder="Date" required="required" data-error="Date is required." />
                                </div>
                            </div> -->
                            <!-- end col -->
<!--                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="time-picker" id="time-picker" placeholder="Time" required="required" data-error="Time is required." />
                                </div>
                            </div> -->


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 button">
                                <div class="reserve-book-btn text-center">
                                    <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit" name="reg_user">Register</button>
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