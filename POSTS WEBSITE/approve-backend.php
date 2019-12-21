<?php
require_once('config.php');
session_start();
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
if(!empty($_POST['type']) && !empty($_POST['email'])){
try{
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
$type = $_POST['type'];
$email = $_POST['email'];
$sql = "SELECT * from $type where email='$email'";
$result = $db->query($sql);
$arr_user = [];
if ($result->num_rows > 0) {
    $arr_user = $result->fetch_all(MYSQLI_ASSOC);
    if($arr_user[0]['status']==0){
$sql = "UPDATE $type SET status = 1 where email='$email'";

$result = $db->query($sql);
echo "done";
    }

}

}catch(Exception $e){
	echo 'error';
}
}
}
?>