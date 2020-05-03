<?php

error_reporting(0);
require('db/connection.php');
require 'sendMail.php';

$query = "SELECT * FROM `user` ORDER BY count DESC LIMIT 10 ";
$result = $con->query($query);
while ($row = $result->fetch_assoc()) {
	$data = array('name'=>$row['firstName'],'email'=>$row['email']);
	$mailResponse = sendMail($data,'winner');
}
?>