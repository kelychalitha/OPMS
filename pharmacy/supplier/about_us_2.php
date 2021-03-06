<!DOCTYPE html>
<html lang="en" dir="ltr">
    <!--Created By Kely weerasooriya-->

    <?php
    session_start();
    if(!isset($_SESSION['token1'])){
        header('Location: ../index.html');
    }
    else
    {
        $token= $_SESSION['token1'];
        $email= $_SESSION['email1'];
        $fname= $_SESSION['fname1'];
        $image= $_SESSION['image1'];
        $cid= $_SESSION['sid'];

    }
    ?>
<head>
    <meta charset="utf-8">
    <title>About </title>
    <link rel="stylesheet" href="../css/style.css">
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
        <div class="para1"><h2>Pharmacy Management System</h2></div>

            <div class="para2">
            <h4>E-Pharmacy - Pharmacy Management System is a very convenient , flexible to use. It is specifically designed to fullfill the medical requirements of the people.As per security measures, We would like to get some of your personal information. Hopefully, you can get a quick service from this system.So you can join with us and get the maximem advantage.<br> 
            You have do very small thing. First of all, If Someone wants to buy their medicines throug a system like this, He/she should access to this system and find the nearest pharmacy by using the google maps . And Then they shall send their prescriptions to that selected pharmacy. Then They will calculate the amount for those medicines and send back to the customers. 
            So that, after the payment done through this system, The Pharmacy will be delivered the medicines which they choosed. </h4><br>
            </div>
            
            <div class="all">
            <div class="para2">
            
            <div class="para1"><h2> The Mission </h2></div>
            <h4> We Strive to develop the most useful and practical fully integrated healthcare pharmacy information system, which is also open source software, allowing other developers to modify, or develop it future as per the needs.</h4>
            </div><br>
            
            <div class="para2">
                <div class="para1"><h2>The Technology</h2></div>
                <h4>The project development is comprised of several components, each having important and specific roles, and supported by a solid infrastructure. </h4>
            
                </div>
                <div class="row">
                    <div class="column">
                      <img src="../images/about1.jpg" alt="image_1" style="width:300px; height: 300px;">
                    </div>
                
                    <div class="column">
                        <img src="../images/about3.jpg" alt="image_2" style="width:300px; height: 300px;">
                      </div>
                  </div>
            </div>
            
        

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
