<!doctype html>
<html lang="en">
<?php
session_start();
if(isset($_SESSION['token'])){
    header('Location: customer/customer_dashboard.php');
}
else
{

} ?>
  <head>
    <link rel="stylesheet" href="css/cusreg.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <title>E-Pharmacy</title>
</head>
<body>
	<nav class="navbar bg-light navbar-light navbar-expand-lg fixed-top">
    <div class="container">
        <a href="#" class="navbar-brand"><img src="images/a.jpg"
            alt="Logo" title="Logo"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">

                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="contactus.php" class="nav-link">Contact Us</a></li>
                    <li class="nav-item"><a href="aboutus.html" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="supreg.php" class="nav-link">Supplier Register</a></li>
                    <li class="nav-item"><a href="cusreg.php" class="nav-link active">Customer Register</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="login.php">Customer</a>
                            <a class="dropdown-item" href="login-supplier.php">Supplier</a>
                            <a class="dropdown-item" href="login-admin.php">Admin</a>
                        </div>

                    </li>
                </ul>
            </div> 
        </div>
    </nav>







 <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Customer Registration</h2>
                </div>
                <!-- <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Customer Registration</a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Blog Start -->
    <div class="blog">
        <div class="container-fluid">
            <form action="controllers/auth/cusReg.php" method="post"  enctype="multipart/form-data">
                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                        <label class="Label">First Name : </label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="" required>
                    </div>
                </div>
                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                        <label class="Label">Last Name : </label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value="" required>
                    </div>
                </div>
                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                        <label class="Label">Email : </label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="" required>
                    </div>
                </div>
                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                        <label class="Label">NIC : </label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="nic" placeholder="NIC" value="" required>
                        <input type="file" class="form-control" name="nicImg" placeholder="NIC" value="" required>
                    </div>
                </div>
                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                        <label class="Label">Profile Picture : </label>
                    </div>
                    <div class="col-lg-6">
                      
                        <input type="file" class="form-control" name="file" placeholder="Profile picture" value="" >
                    </div>
                </div>
                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                        <label class="Label">Contact Number : </label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="phone" placeholder="Contact Number" value="" required>
                    </div>
                </div>
                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                        <label class="Label">Address : </label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control"  name="address" placeholder="Ex: No.32/3," required><br>
                        <input type="text" class="form-control"  name="address2" placeholder="Marligathanna," required><br>
                        <input type="text" class="form-control"  name="city" placeholder="Veyangoda." required>
                    </div>
                </div>

                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                        <label class="Label">Password : </label>
                    </div>
                    <div class="col-lg-6">
                        <input type="Passward" class="form-control" name="password" placeholder="Passward" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
                    </div>
                </div>
                <div class="row rows form-group">
                    <div class="col-lg-4 text-lg-right">
                    </div>
                    <div class="col-lg-6">
                        <button class="btn" type="submit" name="signup">sign up</button>
                    </div>
                </div>
        </div>
    </div>






<div class="footer">
  <h6>E-Pharmacy</h6>
  Copyright &copy; E-Pharmacy
</div>







</body>
</html>
