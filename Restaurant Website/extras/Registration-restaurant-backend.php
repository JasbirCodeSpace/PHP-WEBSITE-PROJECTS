<?php

$db = mysqli_connect('localhost', 'root', '', 'foodshala') or die ("unsuccessfull");

try{
echo "hi";
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
echo "hello";
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
          echo $query;
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	// header('location: index.html');
  }
}else{
  
}
}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>