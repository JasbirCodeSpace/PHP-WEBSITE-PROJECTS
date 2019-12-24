<?php
error_reporting(0);
session_start();
function upload($query,$choice) {
require('config.php');
mysqli_set_charset('utf8');

    $maxsize = 250*1000; 

    
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

       
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    
$ext = end(explode('.', $_FILES['userfile']['name']));
$checkExt = array("jpg","png","jpeg","PNG","JPG","JPEG");
  if(in_array($ext, $checkExt)){
?>
<?php
  }
  else{
    ?>
<script type="text/javascript">
    alert('File type not supported'+'\n'+'Please select JPG,JPEG,PNG file');
</script>
    <?php
    return 'Error';
  }
            if( $_FILES['userfile']['size'] < $maxsize) {  
            
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");

if ($choice=="register" || $choice=="post") {

    $sql = $query."'{$imgData}');";
}else if($choice=="update"){
    $email = $_SESSION['login_user_email'];
$sql = $query."'{$imgData}' where email='$email';";
}
                  
                      $result = mysqli_query($db, $sql);
                      if($result){
                        if($choice=="register"){
                        //                             echo "<script>alert('Registration successfully :Wait for Super Admin to approve account');</script>";
                        // header('location:login.php');
                            ?>
                        <script>alert('Registration successfully :Wait for Super Admin to approve account');
location.href ='login.php' ;
</script>
                        
                        <?php 
                    }else if($choice=="post"){
                        //                             echo "<script>alert('Registration successfully :Wait for Super Admin to approve account');</script>";
                        // header('location:login.php');
                            ?>
                        <script>alert('successfully created post');
location.href ='login.php' ;
</script>
                        
                        <?php 
                    }else{
                        ?>
                                                <script>alert('Update successfully');
location.href ='posts.php' ;
</script>
                        <?php 
                        // echo "<script>alert('Update successfully');</script>";
                        // header('location:posts.php');
                    }

                        // return "Success";
                      }else{
                        if($choice=="register"){
                        // echo "<script>alert('Registration fail : Try Again');</script>";
                        // header('location:register.php');
                        ?>
                                                                   <script>alert('Registration fail : Try Again');
location.href ='register.php' ;
</script>     
                        <?php 
                    }else{
                        // echo "<script>alert('Update fail : Try Again');</script>";
                        // header('location:posts.php');
                        ?>
                                         <script>alert('Update fail : Try Again');
location.href ='posts.php' ; 
                        <?php
                    }
                        // return "error";
                      }
  //                     if (!mysqli_query($db, $sql))
  // {

  //   // echo "<script>alert('Something went wrong');</script>";
  //   $msg = 'Something went wrong';
  //   echo "<script>alert($msg);</script>";
  //   // return $msg;
  // }
  
  $user = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($user)>0){
    ?>
    <script type="text/javascript">
        alert('Sucess');
        location.href="<?php echo $_SERVER['REQUEST_URI'];?>";
    </script>
    <?php
   //  echo "<script>alert('Success');</script>";
   // header('Location: '.$_SERVER['REQUEST_URI']);
// return "Success";
          }  else{
             $msg = 'Something went wrong';
    echo "<script>alert($msg);</script>";
return $msg;
          }        
?>

<?php
$msg='';
            }
             else {
              
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";

    }
    else {
	
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
?>
<?php
echo "<script>alert($msg);</script>";
    return $msg;
}

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return ' ';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}

?>