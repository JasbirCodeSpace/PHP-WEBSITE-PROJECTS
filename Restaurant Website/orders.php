<?php 
session_start();

if (isset($_SESSION['login_type']) && $_SESSION['login_type']=="Restaurant") {
}else{
header("location: menu.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <title>FoodShala</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="css/colors/orange.css" />

    <!-- Modernizer -->
    <script src="js/modernizer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
          <!-- algorithm table  -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){


$("#menu-link").click(function(){
    $('#menu').show();
    $('#order').hide();
});
$('#order-link').click(function(){
    $('#order').show();
    $('#menu').hide();
});
$("#menu-link").click();
});
    </script>
    <style type="text/css">
        .example_c {
color: #494949 !important;
text-transform: uppercase;
text-decoration: none;
background: #ffffff;
padding: 5px 10px 5px 10px;
border: 4px solid #494949 !important;
display: inline-block;
transition: all 0.4s ease 0s;
}
.example_c:hover {
color: #ffffff !important;
background: #e75b1e;
border-color: #e75b1e !important;
transition: all 0.4s ease 0s;
}
    </style>
</head>

<body>
        <div id="loader">
        <div id="status"></div>
    </div>
    <div id="site-header">
        <header id="header" class="header-block-top">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <!-- navbar -->
                        <nav class="navbar navbar-default" id="mainNav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="logo">
                                    <a class="navbar-brand js-scroll-trigger logo-header" href="index.html">
                                        <h1 style="font-style: bold;color: #fff;padding-top: 20px;">FoodShala</h1>
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.html">Home</a></li>
                                    <li id='menu-link'><a href="#">Menu</a></li>
                                    <li id='menu-link'><a href="menu-item.php">Add Item</a></li>
                                    <li id='order-link'><a href="#">Orders</li>

                                </ul>
                            </div>
                            <!-- end nav-collapse -->
                        </nav>
                        <!-- end navbar -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </header>
        <!-- end header -->
    </div>
    <div class="special-menu pad-top-100 parallax" >
        <div class="container">

        </div>
        <!-- end container -->
    </div>
    <!-- end special-menu -->

    <div id="menu" class="menu-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
                        Your Menu    
                    </h2>
                        <p class="title-caption text-center">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                    </div>

                    <div class="tab-menu">

                        <div class="slider slider-single">
                            <div id="food-items">
                                <?php 
                                error_reporting(0);
require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
session_start();
$email = $_SESSION['login_user_email'];
$sql = "SELECT * FROM menu where restaurant_email='$email'";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($result)) {
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="images/menu-item-thumbnail-01.jpg" alt="" class="img-responsive">
                                        <div>
                                            <h3><?php echo $row['food_item']; ?></h3>
                                            <p>
                                                <?php echo $row['restaurant_name'];?>
                                                <br>
                                                <?php echo 'Rs. '.$row['price'];?>
                                                <br>
                                                <?php echo $row['food_type'].' | '.$row['category'];?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
<?php

}

?>

                                
                            </div>
                        </div>
                    </div>
                    <!-- end tab-menu -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <div id="order" class="menu-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div>
                        <h2 class="block-title text-center">
                        Orders   
                    </h2>
                </div>
                <div class="container">
            <div class="row">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Food Item</th>
                            <th>Customer Email</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                    session_start();
require('config.php');
$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
$email = $_SESSION['login_user_email'];
                    $query1 = "SELECT * FROM orders WHERE restaurant_email='$email'";
                   
                    $result1 = mysqli_query($db, $query1);
                   
                    while($row = mysqli_fetch_assoc($result1)){
                        
                        $col1 = $row['food_item'];
                        $col2 = $row['user_email'];
                        $query2 = "SELECT * FROM customer WHERE email='$col2' LIMIT 1";
                        $result2 = mysqli_query($db, $query2);
                        $user = mysqli_fetch_assoc($result2);
                        $col3 = $user['name'];
                        $col4 = $user['add_line_1'].'<br>'.$user['add_line_2'].$user['city'].'<br>'.$user['zip_code'];
                        $col5 = $user['contact'];

                        $col6 = $row['count'];
                    ?> 
                        <tr>
                            <td><?php echo $col1; ?></td>
                            <td><?php echo $col2; ?></td>
                            <td><?php echo $col3; ?></td>
                            <td><?php echo $col4; ?></td>
                            <td><?php echo $col5; ?></td>
                            <td><?php echo $col6; ?></td>
                        </tr>
                <?php   
                }  //End of while loop
                ?>     
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

    <!-- end menu -->
        <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

              <!-- data tables -->
          <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
          <script type="text/javascript">
    var table = $('#example').DataTable();
</script>
</body>
</html>