<?php 

  session_start();
  if (isset($_SESSION['login_user_name'])) {
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
        var check = <?php echo isset($_SESSION['login_user_email']);?>+'';
                    var type = "<?php error_reporting(0);
        echo $_SESSION['login_type'];?>";
        if(check&&type){
            document.getElementById('cart-link').innerHTML = "<a href='orders.php'>Order Page</a>";
        }else{

        }
        
       window.order = function(str1,str2){
          if('<?php echo isset($_SESSION['login_user_name']);?>'!=''){
      
          if("<?php if(isset($_SESSION['login_type'])){echo $_SESSION['login_type'];}else{echo '';};?>"=="Customer"){
              
                          Swal.fire({
      title: str1,
      text: "Restaurant :"+str2,
      input: 'text',
      inputAttributes: {
      autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'Add to Cart',
      cancelButtonText:'Cancel'
      
      }).then((result) => {
      if (parseInt(result.value)) {
      $.ajax({
      url: 'cart-backend.php',
      type: 'POST',
      data: {
          food_item: str1,
          restaurant_name:str2,
          count:parseInt(result.value)
      
      },
      success:function(data){
      
      },
      error:function(data){
          
      }
      });
      
      
      Swal.fire({
      title: result.value+' '+str1+" added successfully to cart"
      })
      setTimeout(function() {
    location.reload(true);
}, 2000);
      
      
      }
      })
      
          }else if("<?php if(isset($_SESSION['login_type'])){echo $_SESSION['login_type'];}else{echo '';};?>"=="Restaurant"){
              console.log('Restaurant');
              Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Restaurant are not allowed to place order!',
      footer: '<a href="Login-customers.php">Login as customer here</a>'
      })
          }}
          else{
                              Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Login before order!',
      footer: '<a href="Login-customers.php">Login as customer here</a>'
      }).then(function (result) {
  if (result.value) {
    window.location = "Login-customers.php";
  }
})
              
          }
      
      }
      
      window.finalorder = function(str1,str2,str3){
              $.ajax({
      url: 'order-backend.php',
      type: 'POST',
      data: {
          food_item: str1,
          restaurant_name:str2,
          count:str3
      
      },
      success:function(data){
        data = data.split('?',2);

          switch(data[0]){
              case "already":     
                                    Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'Order is already placed to your address'+'\n'+data[1],
                                  footer: '<a href="menu.php">Go to menu</a>'
                                  })
              break;
              case "success":       
                                    Swal.fire({
                                     icon: 'success',
                                      title: 'Done',
                                      text: 'Order is successfully placed for your registered address'+'\n'+data[1],
                                      footer: '<a href="menu.php">Go to menu</a>'
                                      })
              break;
              default:        Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong\nUnable to process request',
                              footer: '<a href="menu.php">Go to Menu</a>'
                              })
              break;
          }
      },
      error:function(data){
          alert(data);
      }
      });
      }
      
      $("#menu-link").click(function(){
      $('#menu').show();
      $('#special-menu').show();
      $('#cart').hide();
      });
      $('#cart-link').click(function(){
      $('#cart').show();
      $('#menu').hide();
      $('#special-menu').hide();
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
                    <li id='cart-link'>
                      <a href="#">
                        Cart
                    </li>
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
    <!-- end special-menu -->
    <div id="menu" class="menu-main pad-top-100 pad-bottom-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
              <h2 class="block-title text-center">
                Our Menu    
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
                    $sql = "SELECT * FROM menu";
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
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="reserve-book-btn text-center">
                          <button class="hvr-underline-from-center order" onclick="order('<?php echo $row['food_item'];?>','<?php echo $row['restaurant_name'];?>')">Order</button>
                        </div>
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
    <div id="cart" class="menu-main pad-top-100 pad-bottom-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div>
              <h2 class="block-title text-center">
                Cart   
              </h2>
            </div>
            <div class="container">
              <div class="row">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Food Item</th>
                      <th>Restaurant Name</th>
                      <th>Quantity</th>
                      <th>Order</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      session_start();
                      require('config.php');
					  $db = mysqli_connect($db_host,$db_user,$db_pass, $db_database) or die ("unsuccessfull");
                      $email = $_SESSION['login_user_email'];
                      $query1 = "SELECT * FROM cart WHERE email='$email'";
                      $result1 = mysqli_query($db, $query1);
                      
                      while($row = mysqli_fetch_assoc($result1)){
                          $col1 = $row['food_item'];
                          $col2 = $row['restaurant_name'];
                          $col3 = $row['count'];
                      ?> 
                    <tr>
                      <td><?php echo $col1; ?></td>
                      <td><?php echo $col2; ?></td>
                      <td><?php echo $col3; ?></td>
                      <td>
                        <div class="button_cont" align="center"><a class="example_c" onclick="finalorder('<?php echo $row['food_item'];?>','<?php echo $row['restaurant_name'];?>','<?php echo $col3;?>')" target="_blank" rel="nofollow noopener">Order</a></div>
                      </td>
                    </tr>
                    <?php   }  //End of while loop
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