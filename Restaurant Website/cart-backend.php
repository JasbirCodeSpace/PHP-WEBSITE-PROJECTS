<?php
session_start();
require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
$name = $_SESSION['login_user_name'];
$email = $_SESSION['login_user_email'];
$food_item = $_REQUEST['food_item'];
$restaurant_name = $_REQUEST['restaurant_name'];
$count = $_REQUEST['count'];

$query = "SELECT * FROM cart WHERE email='$email' and food_item='$food_item' and restaurant_name='$restaurant_name'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);
  try{
  	$status = '';
  if ($user) { // if user exists
$query = "UPDATE cart SET count=count+'$count' WHERE email='$email' and food_item='$food_item' and restaurant_name='$restaurant_name'";
$status = mysqli_query($db, $query);
  }else{
$query = "INSERT INTO cart (name, email, food_item,restaurant_name,count) 
  			  VALUES('$name','$email','$food_item','$restaurant_name','$count')";
  	$status = mysqli_query($db, $query);
  }
if ($status) {
	echo "success";
}else{
	echo "error";
}
}catch(Exception $e){
	echo $e;
}
?>