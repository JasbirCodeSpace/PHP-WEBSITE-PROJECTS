<?php

$host = 'localhost';
$user= 'root';
$password = '';
$db = 'honeymint';

$con = mysqli_connect($host,$user,$password,$db);

if($con->connect_errno){
	echo json_encode(array('status'=>false,'msg'=>'DB connection error'));
	exit;
}
?>