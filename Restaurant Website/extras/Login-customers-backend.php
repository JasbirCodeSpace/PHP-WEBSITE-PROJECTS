<?php
$db = mysqli_connect('localhost', 'root', '', 'foodshala') or die ("unsuccessfull");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['login_user']) && !empty($_POST['login_user'])) {
      // username and password sent from form 
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      $sql = "SELECT * FROM customer WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         echo "hi";
         // session_register("myusername");
         $_SESSION['login_user_name'] = $row['name'];
         $_SESSION['login_user_email'] = $row['email'];
         $_SESSION['login_type'] = 'Customer';

         
         header("location: index.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>