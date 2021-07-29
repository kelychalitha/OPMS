<!DOCTYPE html>
  <!--Created By Kely weerasooriya-->
<?php
session_start();
if(!isset($_SESSION['token1'])){
    header('Location: ../index.html');
}
else
{
    include '../controllers/apiConfig.php';
    $token= $_SESSION['token1'];
    $email= $_SESSION['email1'];
    $fname= $_SESSION['fname1'];
    $image= $_SESSION['image1'];
    $cid= $_SESSION['sid'];

}
?>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Supplier</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/supplier.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

<body>
    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
        <label for="check">
            <i class="fa fa-bars" aria-hidden="true" id="sidebar_btn"></i>


        </label>
        <div class="left-area">
            <!--<h3><span>OPMS</span></h3>-->
            <img src="../images/logo.jpg" />
        </div>
        <div class="right-area">
            <a href="../controllers/auth/logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
        <center>
            <img src="../uploads/supplier/<?php echo ($image)?>" class="profile_image" class="center" alt="customer profile image">
            <h4><?php echo ($fname)?></h4>
        </center>
        <a href="supplier_dashboard.php"><i class="fa fa-desktop" aria-hidden="true"></i><span>Dashboard</span></a>
        <a href="order_supplier2.php"><i class="fas fa-eye" aria-hidden="true"></i><span>View Order</span></a>
        <a href="about_us_2.php"><i class="fa fa-info-circle" aria-hidden="true"></i><span>About Us</span></a>
        <a href="supplier_profile_settings.php"><i class="fa fa-sliders-h" aria-hidden="true"></i><span>Settings</span></a>

    </div>
    <!--sidebar end-->
    <div class="content">
        
<h2>Order Details</h2></br>


        <table>
            <tr>
                <th>Date</th>
                <th>Order ID </th>
                <th>Total</th>
                <th>Payment Details</th>
                <th>Order Status</th>
                <th>View Order</th>
                <th>Send Invoice</th>
            </tr>

            <?php

            $url= $apiUrl."precription/precription/".$cid;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_ENCODING, ""); // this will handle gzip content
            $response  = curl_exec($ch);

            // Check for errors
            if($response === FALSE){
                die(curl_error($ch));
                echo 'Dead';
            }

            // Decode the response
            $responseData = json_decode($response, TRUE);


            if($responseData != null){
                foreach ($responseData  as $key => $value) {
                    echo "<tr> <td>".  $value["date"]. "</td><td> ". $value["_id"]. "</td><td> ". $value["total"]. "</td><td> ". $value["payment"]. "</td><td> "
                        . $value["status"]."</td>"; 
                        
                        $pos = strpos($value["image"], 'http');

                        if ($pos === false) {
                           
                            $value["image"] = $value["cid"].$value["image"];
                        }else{
                             //do nothing
                        }
                        
                        ?>
                    <td>
                        <form action="order_details.php" method="post">
                            <input type="hidden" name="oid" value="<?php echo ($value["_id"])?>">
                            <input type="hidden" name="date" value="<?php echo ($value["date"])?>">
                            <input type="hidden" name="address" value="<?php echo ($value["address"])?>">
                            <input type="hidden" name="email" value="<?php echo ($value["email"])?>">
                            <input type="hidden" name="img" value="<?php echo ($value["image"])?>">
                            <input type="hidden" name="total" value="<?php echo ($value["total"])?>">
                            <button type="submit" name="order" class="button">View Order</button>
                        </form>
                    </td>
                    <td>
                        <form action="order_email.php" method="post">
                            <input type="hidden" name="oid" value="<?php echo ($value["_id"])?>">
                            <input type="hidden" name="date" value="<?php echo ($value["date"])?>">
                            <input type="hidden" name="address" value="<?php echo ($value["address"])?>">
                            <input type="hidden" name="email" value="<?php echo ($value["email"])?>">
                            <input type="hidden" name="img" value="<?php echo ($value["image"])?>">
                            <input type="hidden" name="total" value="<?php echo ($value["total"])?>">
                            <button type="submit" name="order" class="button">Send</button>
                        </form>



                    </td>

                    <?php
                    echo "</td></tr>";

                }
            }
            else{
                echo "No Data Found";
                exit();
            }


            ?>
        </table>
        

    </div>
    <!-- Begin footer content -->
    <footer class="footer">
        <div class="container">
            <span>E-Pharmacy &copy; 2021</span>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>



</body>

</html>
