<?php
session_start();
error_reporting(0);
require ('connection.php');
require 'encrypt_decrypt.php';
require '../sendMail.php';

$data = $_POST['formData'];
$fname = $con->real_escape_string($data['fname']);
$lname = $con->real_escape_string($data['lname']);
$email = $con->real_escape_string($data['email']);
$phone = $con->real_escape_string($data['phone']);

$query = "SELECT * FROM `user` WHERE email = '$email'";
$result = $con->query($query);
if (mysqli_num_rows($result) == 0)
{
    $sharelink = my_encrypt(addslashes($email));
    $query = "INSERT INTO `user`(firstName,lastName,email,phone,link) VALUES('$fname','$lname','$email','$phone','$sharelink')";
    $result = $con->query($query);
    $json = '';
    if ($result)
    {
        $data = array(
            'name' => $fname,
            'link' => $sharelink,
            'email' => $email
        );
        $emailResponse = sendMail($data, 'register');

        $json = array(
            'status' => true,
            'msg' => 'Successfully registered'
        );

        if ($_SESSION['reffered_id'] != '')
        {
            $query = "UPDATE `user` SET count = count + 1 WHERE id = {$_SESSION['reffered_id']}";
            $result = $con->query($query);
        }
    }
    else
    {
        $json = array(
            'status' => false,
            'msg' => "Error while registration"
        );
    }
}
else
{
    $json = json_encode(array(
        'status' => false,
        'msg' => 'Given email already registered'
    ));
}

$con->close();
echo json_encode($json);
exit;

?>
