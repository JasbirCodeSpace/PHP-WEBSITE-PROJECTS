<?php
if (!isset($_SESSION['login_type']) || empty($_SESSION['login_type'])) {
  header('location:index.html');
}
if ($_SESSION['login_type']!="Super Admin") {
  header('location:index.html');
}
session_start();
require_once('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
$sql = "SELECT * from user where status=0";

$result = $db->query($sql);
$arr_user = [];
if ($result->num_rows > 0) {
    $arr_user = $result->fetch_all(MYSQLI_ASSOC);
}

$sql = "SELECT * from admin where status=0";

$result = $db->query($sql);
$arr_admin = [];
if ($result->num_rows > 0) {
    $arr_admin = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Philosophy</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<script type="text/javascript">
                function approve(text1,text2){
                                    $.ajax({
                        url: "approve-backend.php",
                        type: "POST",
                        data: { type: text1, email: text2 },
                        success: function(response){
                              if (response=="done") {
                                alert("Successfully approved\n"+text1+" : "+text2);
                              }else{
                                alert('Something went wrong');
                              }
                              location.reload();
                        },
                        error: function(response){
                              alert('Something went wrong');
                              location.reload();
                        }
                    });
            }
</script>
</head>

<body>

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
                        <img src="images/logo.svg" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>
        
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>


                    <ul class="header__nav">
                        <li class="current"><a href="posts.php" title="">Posts</a></li>
                        <?php 
                        if($_SESSION['login_type']=="Admin"){
                            ?>
                        <li><a href="create-post.php" title="">Create Post</a></li>
                        <?php 
                    }?>
                      <?php if($_SESSION['login_type']=="Super Admin"){
                            ?>
                        <li><a href="allusers.php" title="">USERS</a></li>
                        <?php 
                    }?>
                        <li><a href="update-info.php" title="">Update Profile</a></li>
                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->


    </section> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">
                <div class="row masonry-wrap">
            <div class="masonry">
                <div class="grid-sizer"></div>
                    <div class="text-center">
                <h1>Profile : User</h1>
            </div>
        <div class="container mt-5">
        <table id="usetTable" class="table">
            <thead>
<th>S.No.</th>
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Contact</th>
<th>Address</th>
<th>Register Date</th>
<th>Action</th>

            </thead>
            <tbody>
                <?php if(!empty($arr_user)) { ?>
                    <?php 
                    $i=1;
                    foreach($arr_user as $user) { ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['gender']; ?></td>
                            <td><?php echo $user['contact']; ?></td>
                            <td><?php echo $user['address'].'<br>'.$user['city'].'<br>'.$user['state'].' - '.$user['zip_code'].'<br>'.$user['country']; ?></td>
                            <td><?php echo $user['date_reg']; ?></td>
                            <td><button class="btn btn--primary" onclick="approve('<?php echo 'user';?>','<?php echo $user['email']; ?>')">Approve</button></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
<h1>Profile : Admin</h1>
</div>
    <div class="container mt-5">
        <table id="adminTable" class="table">
            <thead>
<th>S.No.</th>
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Contact</th>
<th>Address</th>
<th>Register Date</th>
<th>Action</th>
            </thead>
            <tbody>
                <?php if(!empty($arr_admin)) { ?>
                    <?php 
                    $i=1;
                    foreach($arr_admin as $user) { ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['gender']; ?></td>
                            <td><?php echo $user['contact']; ?></td>
                            <td><?php echo $user['address'].'<br>'.$user['city'].'<br>'.$user['state'].' - '.$user['zip_code'].'<br>'.$user['country']; ?></td>
                            <td><?php echo $user['date_reg']; ?></td>
                            <td><button class="btn btn--primary" onclick="approve('<?php echo 'admin';?>','<?php echo $user['email']; ?>')">Approve</button></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
    </section> <!-- s-content -->





    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usetTable').DataTable();
            $('#adminTable').DataTable();

        } );
    </script>
</body>

</html>