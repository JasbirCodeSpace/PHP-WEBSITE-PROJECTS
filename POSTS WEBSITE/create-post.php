<?php
error_reporting(0);

session_start();
if (!isset($_SESSION['login_type']) || empty($_SESSION['login_type'])) {
  header('location:index.html');
}
if ($_SESSION['login_type']!="Admin") {
  header('location:posts.html');
}

require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
try{

  if(isset($_POST['reg_post']) && !empty($_POST['reg_post'])){

    $admin_email =  mysqli_real_escape_string($db,$_SESSION['login_user_email']);
    $topic = mysqli_real_escape_string($db, $_POST['topic']);
    $post_text = mysqli_real_escape_string($db, $_POST['text']);
    $post_date = date('Y-m-d');


$search_query = '';
$search_query = "SELECT * FROM posts WHERE admin_email='$admin_email' and topic='$topic' and post_text='$post_text' LIMIT 1";
  $result = mysqli_query($db, $search_query);
  $post = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result)>0) { // if user exists
    
      array_push($errors, "Post already exist"+$admin_email);
  }

  else{
require('image-upload.php');
$query = "SELECT * FROM posts
WHERE id = (
    SELECT MAX(id) FROM posts)";
      $result = mysqli_query($db, $query);
  $post = mysqli_fetch_assoc($result);
$id = $post['id']+1;
$query = "INSERT INTO posts (id,admin_email,topic,post_text,post_date,image) VALUES ('$id','$admin_email','$topic','$post_text','$post_date',";
if(!isset($_FILES['userfile']))
{
    $query = "INSERT INTO posts (id,admin_email,topic,post_text,post_date) VALUES ('$id','$admin_email','$topic','$post_text','$post_date')";
          $result = mysqli_query($db, $query);
  $post = mysqli_fetch_assoc($result);
  ?>
  <script type="text/javascript">
    alert("Post Created Successfully");
    location.href = "posts.php";
  </script>
  <?php
}
else
{
  echo "else";
    try {
    $msg= upload($query,"post");  
    echo $msg;  
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}
  
}



  }
else{
  // echo 'error';
}
}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Create Post</title>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="css/colors/strong-blue.css" />
    <!-- Modernizer -->
    <script src="js/modernizer.js"></script>
    <style type="text/css">
      .button{
      padding-bottom: 30px;
      }
    </style>
  </head>
  <body>
    <div id="loader">
      <div id="status"></div>
    </div>

    <div id="reservation" class="reservations-main pad-top-100">
      <div class="container">
        <div class="row">
          <div class="form-reservations-box">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2 class="block-title text-center">
                  Create Post           
                </h2>
              </div>
              <form method="POST" id="post-form" class="reservations-box" action="create-post.php" enctype="multipart/form-data">
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="text" name="topic" placeholder="Topic *" required="required" data-error="Topic is required.">
                  </div>
                </div>

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <input type="file" id="userfile" name="userfile" placeholder="Upload Image *">
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-box">
                    <input type="text" class="textarea" name="text" placeholder="Text here *" required="required" data-error="Text of post is required.">
                  </div>
                </div>
                   

                

                <!-- end col -->

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 button">
                  <div class="reserve-book-btn text-center">
                    <button class="hvr-underline-from-center" type="submit" value='submit' name="reg_post">Create</button>
                  </div>
                </div>
                
                <!-- end col -->
              </form>
              <!-- end form -->
            </div>
            <!-- end col -->
          </div>
          <!-- end reservations-box -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end reservations-main -->
    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script type="text/javascript">
          $("input.textarea").each(function () {
        var $txtarea = $("<textarea />");
        $txtarea.attr("id", this.id);
        $txtarea.attr("class","full-width");
        $txtarea.attr("rows", 8);
        $txtarea.attr("cols", 60);
        $txtarea.attr("placeholder", 'Enter Text Here *'); 
        $txtarea.attr("form", 'post-form');   
            $txtarea.attr("name","text");  
        $txtarea.val(this.value);
        $txtarea.css({ width :'100%' }); 

        $(this).replaceWith($txtarea);
    });
    </script>
  </body>
</html>