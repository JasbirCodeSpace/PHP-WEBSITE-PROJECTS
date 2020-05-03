<?php

error_reporting(0);
require('db/connection.php');

$query = "SELECT * FROM `user` ORDER BY count DESC LIMIT 10 ";
$result = $con->query($query);
?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>HoneyMint | Winners</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Top 10 winners of HoneyMint Contest</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="winner_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Email</td>  
                                    <td>Phone</td>  
                                    <td>Count</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["firstName"].' '.$row["firstName"].'</td>  
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["phone"].'</td>  
                                    <td>'.$row["count"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#winner_data').DataTable();  
 });  
 </script> 