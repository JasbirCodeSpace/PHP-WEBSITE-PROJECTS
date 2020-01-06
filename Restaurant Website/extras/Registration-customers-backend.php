<?php

$db = mysqli_connect('localhost', 'root', '', 'foodshala') or die ("unsuccessfull");

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
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.html');
  }
}else{
  echo 'error';
}
}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>