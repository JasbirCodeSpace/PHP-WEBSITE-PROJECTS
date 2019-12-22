<?php
error_reporting(0);
session_start();
// echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>";
require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
try{

  if(isset($_POST['reg_user']) && !empty($_POST['reg_user'])){


    $user_type = mysqli_real_escape_string($db, $_POST['user_type']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contact=mysqli_real_escape_string($db, $_POST['contact']);
  $pswrd_1= mysqli_real_escape_string($db, $_POST['password1']);
$pswrd_2 = mysqli_real_escape_string($db, $_POST['password2']);
if ($pswrd_1==$pswrd_2) {
  # code...

// $image=mysqli_real_escape_string($db, $_POST['image']);
$address=mysqli_real_escape_string($db, $_POST['address']);
$city=mysqli_real_escape_string($db, $_POST['city']);
$state=mysqli_real_escape_string($db, $_POST['state']);
$country=mysqli_real_escape_string($db, $_POST['country']);
$zip_code=mysqli_real_escape_string($db, $_POST['zip_code']);

$search_query = '';
if($user_type=="User"){
$search_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
}elseif ($user_type=="Admin") {
  $search_query = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
  
}
  $result = mysqli_query($db, $search_query);
  $user = mysqli_fetch_assoc($result);
  
  if (mysqli_num_rows($user)>0) { // if user exists
    
      array_push($errors, "User already exists with the email id "+$email);
  }

  // Finally, register user if there are no errors in the form
  else{
    // $password = md5($password_1);//encrypt the password before saving in the database
    $password = $pswrd_1;
    $query='';
    $date = date('Y-m-d');
require('image-upload.php');



    if($user_type=="User"){
$query = "INSERT INTO user (name, email, password,gender,contact,address,city,state,zip_code,country,date_reg,status,image) 
          VALUES('$name', '$email', '$password','$gender','$contact','$address','$city','$state','$zip_code','$country','$date',0,";
}elseif ($user_type=="Admin") {
  $query = "INSERT INTO admin (name, email, password,gender,contact,address,city,state,zip_code,country,date_reg,status,image) 
          VALUES('$name', '$email', '$password','$gender','$contact','$address','$city','$state','$zip_code','$country','$date',0,";
  
}
if(!isset($_FILES['userfile']))
{
    echo '<p>Please select a file</p>';
}
else
{
    try {

    $msg= upload($query,'register');  
    
    mysqli_close($db);
    // header("location:login.php");


    }
    catch(Exception $e) {
    echo $e->getMessage();
        echo "<script type='text/javascript'>alert('Sorry, could not upload file');</script>";
        mysqli_close($db);
    }
}


  }
}else{
?>
<script type="text/javascript">alert('Password did not not match');</script>
<?php
}
}
else{
  // echo 'error';
  mysqli_close($db);
}
}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
  echo "<script type='text/javascript'>alert('Sorry Something went wrong');</script>";
  mysqli_close($db);
}
?>
<html>
  <head>
    <title>Registration</title>
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
    <link id="changeable-colors" rel="stylesheet" href="css/colors/strong-blue.css" />
    <!-- Modernizer -->
    <script src="js/modernizer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style type="text/css">
      .button{
      padding-bottom: 30px;
      }
    </style>
    <script type="text/javascript">
      function error() {
        Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Login before order!',
      footer: '<a href="Login-customers.php">Login as customer here</a>'
      }).then(function (result) {
  if (result.value) {
    window.location = 'Login-customers.php';
  }
})
      }
    </script>
  </head>
  <body>
    <div id="loader">
      <div id="status"></div>
    </div>

    <div id="reservation" class="reservations-main pad-top-100">
      <div class="container">
        <div class="row">
          <div class="form-reservations-box">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2 class="block-title text-center">
                  Sign Up            
                </h2>
              </div>
              <form method="POST" class="reservations-box" action="register.php" enctype="multipart/form-data">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-box">
                    <select name="user_type" class="selectpicker" required="required">
                      <option selected disabled>User Type *</option>
                      <option>Admin</option>
                      <option>User</option>
                    </select>
                  </div>
                </div>
              


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="text" name="name" placeholder="Name *" required="required" data-error="Name is required.">
                  </div>
                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <select name="gender" class="selectpicker" required="required" data-error="Specify gender">
                      <option selected disabled>Gender*</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="email" name="email" placeholder="E-Mail ID *" required="required" data-error="E-mail id is required.">
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
                    <input type="password" name="password1" placeholder="Password *" pattern="([A-Za-z0-9]){6,}" required="required" data-error="Password is required.It should be alpha numeric of atleast 6 characters in length" oninvalid="setCustomValidity('It should be alpha numeric of atleast 6 characters in length')"
    onchange="try{setCustomValidity('')}catch(e){}">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="password" name="password2" placeholder="Retype Password *" pattern="([A-Za-z0-9]){6,}" required="required" data-error="Retype password here.It should be alpha numeric of atleast 6 characters in length">
                  </div>
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="file" name="userfile" placeholder="Upload Image *" required="required" data-error="Upload Image here">
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Address</label>
                  <div class="form-box">
                    <input type="text" name="address" placeholder="Address" required="required" data-error="Enter address *">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input type="text" name="city" placeholder="City*" required="required" data-error="Enter city *">
                  </div>
                </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input type="text" name="state" placeholder="State*" required="required" data-error="Enter state">
                  </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input type="text" name="country" placeholder="Country*" required="required" data-error="Enter country">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input name="zip_code" placeholder="Zip Code*" type="text" pattern="[0-9]{6}" data-error="Zip Code must be numeric and of 6 digits" required="required">
                  </div>
                </div>

                <!-- end col -->

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
