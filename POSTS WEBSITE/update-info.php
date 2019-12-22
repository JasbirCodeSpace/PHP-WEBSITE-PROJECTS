<?php
// error_reporting(0);
session_start();
error_reporting(0);
if (!isset($_SESSION['login_type']) || empty($_SESSION['login_type'])) {
  header('location:index.html');
}

require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
$login_type = $_SESSION['login_type'];
$email = $_SESSION['login_user_email'];
$table = '';
if($login_type=="User"){
  $table = 'user';
}
  else if ($login_type=="Admin") {
    $table = 'admin';
    # code...
  }elseif ($login_type=="Super Admin") {
    # code...
    $table = 'superadmin';
  }
$query = "SELECT * from  $table WHERE email='$email';";
$result = mysqli_query($db, $query);
$user_info = mysqli_fetch_assoc($result);
try{

  if(isset($_POST['reg_user']) && !empty($_POST['reg_user'])){
    $user_type = $_SESSION['login_type'];
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $email = $_SESSION['login_user_email'];
  $contact=mysqli_real_escape_string($db, $_POST['contact']);
  $pswrd_1= mysqli_real_escape_string($db, $_POST['password1']);
$pswrd_2 = mysqli_real_escape_string($db, $_POST['password2']);
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
  
}elseif ($user_type=="Super Admin") {
  $search_query = "SELECT * FROM superadmin WHERE email='$email' LIMIT 1";
  
}
  $result = mysqli_query($db, $search_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
        // $password = md5($password_1);//encrypt the password before saving in the database
    $password = $pswrd_1;
    $query='';
    $date = date('Y-m-d');
require('image-upload.php');



    if($user_type=="User"){
$query = "UPDATE user SET name='$name', email='$email', password='$password',gender='$gender',contact='$contact',address'$address',city='$city',state='$state',zip_code='$zip_code',country='$country',date_reg='$date',status=1,image=";
}elseif ($user_type=="Admin") {
$query = "UPDATE admin SET name='$name', email='$email', password='$password',gender='$gender',contact='$contact',address'$address',city='$city',state='$state',zip_code='$zip_code',country='$country',date_reg='$date',status=1,image=";
  
}elseif ($user_type=="Super Admin") {
$query = "UPDATE superadmin SET name='$name', email='$email', password='$password',gender='$gender',contact='$contact',address'$address',city='$city',state='$state',zip_code='$zip_code',country='$country',date_reg='$date',status=1,image=";
  
}

if(!isset($_FILES['userfile']))
{
    echo '<p>Please select a file</p>';
}
else
{
    try {
    $msg= upload($query,'update');  
    echo $msg;  
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}
  }

  // Finally, register user if there are no errors in the form
  else{



  }
}else{
  // echo 'error';
}
}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Update Information</title>
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

    <div id="reservation" class="reservations-main pad-top-100">
      <div class="container">
        <div class="row">
          <div class="form-reservations-box">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2 class="block-title text-center">
                  Update Information           
                </h2>
              </div>
              <form method="POST" class="reservations-box" action="update-info.php" enctype="multipart/form-data">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-box">
                    <select name="user_type" class="selectpicker" required="required" disabled="disabled">
                      <option selected disabled>User Type *</option>
                      <?php if($_SESSION['login_type']=="Admin"){?>
                      <option selected>Admin</option>
                      <option>User</option>
                      <option>Super Admin</option>
                    <?php }?>
                     <?php if($_SESSION['login_type']=="User"){?>
                      <option>Admin</option>
                      <option selected>User</option>
                      <option>Super Admin</option>
                    <?php }?>
                     <?php if($_SESSION['login_type']=="Super Admin"){?>
                      <option>Admin</option>
                      <option>User</option>
                      <option selected>Super Admin</option>
                    <?php }?>
                    </select>
                  </div>
                </div>
              


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="text" name="name" value="<?php echo $user_info['name']?>" required="required" data-error="Name is required.">
                  </div>
                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <select name="gender" class="selectpicker" required="required" data-error="Specify gender">
                      <option selected disabled>Gender*</option>
                      <?php if($user_info['gender']=="Male"){?>
                      <option selected>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    <?php }?>
                      <?php if($user_info['gender']=="Female"){?>
                      <option >Male</option>
                      <option selected>Female</option>
                      <option>Other</option>
                    <?php }?>
                      <?php if($user_info['gender']=="Other"){?>
                      <option>Male</option>
                      <option>Female</option>
                      <option selected>Other</option>
                    <?php }?>
                    </select>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="email" name="email" value="<?php echo $user_info['email']?>"  required="required" data-error="E-mail id is required." disabled="disabled">
                  </div>
                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="text" name="contact" value="<?php echo $user_info['contact']?>" >
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="password" name="password1" value="<?php echo $user_info['password']?>" required="required" data-error="Password is required.">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="password" name="password2"  value="<?php echo $user_info['password']?>" required="required" data-error="Retype password here">
                  </div>
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="file" name="userfile" required="required" placeholder="Select Image" data-error="Upload Image here">
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Address</label>
                  <div class="form-box">
                    <input type="text" name="address" value="<?php echo $user_info['address']?>"  required="required" data-error="Enter address *">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input type="text" name="city" value="<?php echo $user_info['city']?>"  required="required" data-error="Enter city *">
                  </div>
                </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input type="text" name="state" value="<?php echo $user_info['state']?>"  required="required" data-error="Enter state">
                  </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input type="text" name="country" value="<?php echo $user_info['country']?>"  required="required" data-error="Enter country">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-box">
                    <input name="zip_code" value="<?php echo $user_info['zip_code']?>"  type="text" pattern="[0-9]{6}" data-error="Zip Code must be numeric and of 6 digits" required="required">
                  </div>
                </div>

                <!-- end col -->

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 button">
                  <div class="reserve-book-btn text-center">
                    <button class="hvr-underline-from-center" type="submit" value='submit' name="reg_user">Update</button>
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