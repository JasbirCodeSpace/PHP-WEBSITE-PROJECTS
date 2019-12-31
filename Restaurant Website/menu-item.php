<?php
session_start();
if(isset($_SESSION['login_type']) && $_SESSION['login_type']=='Restaurant'){
    if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['add_item']) && !empty($_POST['add_item'])) {
        require('config.php');
		$db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
        $food_item=$_POST['name'];
        $restaurant_name=$_SESSION['login_user_name'];
        $restaurant_email=$_SESSION['login_user_email'];

        $price=(double)$_POST['price'];
        $food_type=$_POST['food_type'];
        $category=$_POST['food_category'];
        $query = "INSERT INTO menu (food_item,restaurant_name,restaurant_email,price,food_type,category) VALUES ('$food_item','$restaurant_name','$restaurant_email','$price','$food_type','$category')";
        
        $status = mysqli_query($db, $query);
if ($status){
    
}else{
    
}

    }

}else{
    header("location: menu.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Restaurant | Add Menu Item</title>

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
    <link id="changeable-colors" rel="stylesheet" href="css/colors/orange.css" />

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
                    <li id='menu-link'><a href="menu.php">Menu</a></li>
                    <li id='order-link'><a href="orders.php">Order Page</a></li>
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

    <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <div id="reservation" class="reservations-main pad-top-100 pad-bot-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
                        Add Menu Item       
                    </h2>
                        </div>
              <!--           <h4 class="form-title">BOOKING FORM</h4>
                        <p>PLEASE FILL OUT ALL REQUIRED* FIELDS. THANKS!</p> -->

                        <form method="post" class="reservations-box" action="menu-item.php">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="name" id="name" placeholder="Food Name" required="required" data-error="Food name is required.">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="price" id="price" placeholder="Price" required="required" data-error="Price is required.">
                                </div>
                            </div>
                            <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <select name="food_type" class="selectpicker" required="required">
                      <option selected disabled>Food Type*</option>
                      <option>Vegetarian</option>
                      <option>Non-Vegetarian</option>
                    </select>
                  </div>
                </div>
                            
                            <!-- end col -->

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-box">
                    <select name="food_category" class="selectpicker" required="required">
                      <option selected disabled>Food Category *</option>
                      <option>Starters</option>
                      <option>Main Dishes</option>
                       <option>Deserts</option>
                      <option>Drinks</option>
                    </select>
                  </div>
                </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <button class="hvr-underline-from-center" type="submit" value="SEND" id="add_item" name='add_item'>Add </button>
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
</body>
</html>