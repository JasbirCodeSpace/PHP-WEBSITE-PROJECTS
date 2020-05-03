<?php

require 'php_mailer/config.php';

function sendMail($data,$action){
global $mail;
if($action=='register'){
$mail->Subject = "Successfully registered for HoneyMint Contest";
$file=file_get_contents('emailTemplate.php');
$link = $_SESSION['honeymint_home'];
$file= str_replace(array("{name}","{link}"),array($data['name'],$link.'?id='.$data['link']), $file);
$mail->Body = $file;
}elseif ($action=="winner") {
$mail->Subject = "Congratulation on winning HoneyMint Contest";
$file=file_get_contents("winnerEmailTemplate.php");
$link = isset($_SESSION['honeymint_home'])?$_SESSION['honeymint_home']:"http://localhost/PHP-WEBSITE-PROJECTS/New_Product_Campaign";
$file= str_replace(array("{name}","{link}"),array($data['name'],$link), $file);
$mail->Body = $file;
}else{exit;}
$mail->setFrom("contact@honemint.com","HoneyMint");

$mail->addAddress(trim($data['email']));
$mail->isHTML(true);

if ($mail->Send()) {
	return json_encode(array("status"=>true,"msg"=>"Sent Successfully"));
}else{
	return json_encode(array("status"=>false,"msg"=>"Error while sending mail"));
}
}
?>