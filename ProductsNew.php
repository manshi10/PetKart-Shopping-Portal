<?php
    session_start();
    //Connect to server
    $con = mysqli_connect("localhost","root","","petshop");
    // Check connection
    if (!$con)
    {
        echo "Failed to connect to MySQL.";
    }
    
    $sql="SELECT prod_id,name,price,descrip,img_path FROM product p, prod_image pi WHERE p.img_id = pi.img_id";
    
    $result = mysqli_query($con,$sql); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Products</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <style>
            body
            {
                background: url('assets/img/backgrounds/1.jpg') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            .imgsize
            {
                height: 100px;
                width: 100px;
            }
        </style>
    </head>

    <body>
         <section id="all_prod">
            <div class="container">
            <div class="panel panel-warning">
                <div class="panel-heading">All Products
                    <a href="PetKart.php" style="float:right">
                        <span class="glyphicon glyphicon-home"></span>
                    </a></div>
                <div class="panel-body">
                    <center><table class="table table-striped"width="800" border="12" cellpadding="10" cellspacing="15">
                    <tr>
                    <th>What it's called</th>
                    <th>What it costs</th>
                    <th>What it is</th>
                    <th>What it looks like</th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_array($result)) 
                        {
                            $prod_id=$row['prod_id'];
                            $name = $row['name'];
                            $price = $row['price'];
                            $description = $row['descrip'];
                            $image = $row['img_path'];
                            echo "<tr><td>".$name."</td><td>".$price."</td><td>".$description."</td>";
                            echo "<center><td><img src='$image' class='img-circle imgsize'></td></center>";
                            echo"<td><button type='button' class='btn btn-default btn-sm' onclick='addtocart()'";
                            echo"<span class='glyphicon glyphicon-shopping-cart'></span>Add</button></td></tr>";
                            }
                        echo "</table>";
                       
                    ?>
                    </table> </center>
                </div>
            </div> <!--end div panel-success -->
            </div>
       </section> 
        
    </body>
</html>