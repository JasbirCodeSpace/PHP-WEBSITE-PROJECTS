<?php
require('connection.php');

$data = $_POST['formData'];
$fname = $con->real_escape_string($data['fname']);
$lname = $con->real_escape_string($data['lname']);
$email = $con->real_escape_string($data['email']);
$phone = $con->real_escape_string($data['phone']);
$password = $con->real_escape_string($data['pswrd1']);

$query = "INSERT INTO `user`(firstName,lastName,email,phone,password) VALUES('$fname','$lname','$email','$phone','$password')";
$result = $con->query($query);
$json = '';
if ($result) {
	$json = array('status'=>true,'msg'=>'Successfully registered');
}else{
	$json =  array('status'=>false,'msg'=>$con->error);
}
$con->close();;
echo json_encode($json);
exit;

?>