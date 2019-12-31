<?php
session_start();
require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
$name = $_SESSION['login_user_name'];
$email = $_SESSION['login_user_email'];
$food_item = $_REQUEST['food_item'];
$restaurant_name = $_REQUEST['restaurant_name'];
$count=$_REQUEST['count'];
$query = "SELECT * FROM restaurant WHERE name='$restaurant_name'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);
$restaurant_email = $user['email'];


$query = "SELECT * FROM orders WHERE user_email='$email' and restaurant_email='$restaurant_email' and food_item='$food_item' ";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);
$status = false;
  try{
  	
  if ($user) { // if user exists
    echo 'already?';
      $query = "SELECT * FROM customer WHERE email='$email'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);
echo $user['add_line_1'].$user['add_line_2'].' '.$user['city'].'-'.$user['zip_code'];
    return;

  }else{


$query = "INSERT INTO orders (user_email, restaurant_email, food_item,count) 
  			  VALUES('$email','$restaurant_email','$food_item','$count')";
  	mysqli_query($db, $query);
    $status =true;
  }
if ($status) {
	echo "success?";
  $query = "SELECT * FROM customer WHERE email='$email'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);
echo $user['add_line_1'].$user['add_line_2'].' '.$user['city'].'-'.$user['zip_code'];
}else{
	echo "error?";

}
return;
}catch(Exception $e){
	echo 'error?';
  return;
}
?>