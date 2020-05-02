<?php
require 'php_mailer/config.php';
$mail->Subject = "Test Mail";
$mail->setFrom("shikhawat.jasbir@gmail.com");
$mail->Body="Hi there";
$mail->addAddress("shikhawat.jasbir@gmail.com");
if ($mail->Send()) {
	echo json_encode(array("status"=>true,"msg"=>"Sent Successfully"));
}else{
	echo json_encode(array("status"=>false,"msg"=>"Error while sending mail"));
}

?>