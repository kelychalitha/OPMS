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
    <link rel="stylesheet" href="css/login.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 -->

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
                    <li class="nav-item"><a href="cusreg.php" class="nav-link">Customer Register</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="login.php">Customer</a>
                            <a class="dropdown-item" href="login-supplier.php">Supplier</a>
                        </div>

                    </li>
                </ul>
            </div> 
        </div>
    </nav>  <br><br><br>


    
    <section class="Form my-4 mx-5">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-lg-5 mt-3">
    				<img src="images/b.png" class="img-fluid" alt="">
    			</div>
    			<div class="col-lg-7 px-5 pt-5">
    				<h1 class="font-weight-bold py-3">Login</h1>
    				<h4>Sign into your account</h4>
    				<form action="controllers/auth/cusLogin.php" method="POST">
    					<div class="form-row">
    						<div class="col-lg-7">
    							<label>Email: </label>
    							<input type="text" placeholder="Enter your Email" name="email" class="form-control my-2 p-2" >
    						</div>

    					</div>

    				    <div class="form-row">
    						<div class="col-lg-7">
    							<label>Passward: </label>
    							<input type="Password" placeholder="Enter your Password" class="form-control my-2 p-2" name="password">
    						</div>

    					</div>

    				    <div class="form-row">
    						<div class="col-lg-7">
    							<input class="btn btn-success" type="submit" name="Login" class="btn1">
    							
    						</div>

    					</div> 
    					 <div class="form-row">
    						<div class="col-lg-7">
    							<input  class="btn btn-secondary" type="reset" name="reset" class="btn2 mb-3">
    							
    							
    						</div>

    					</div>
                        <div class="link mb-5">
    					<a href="#"> Forgot Passward </a></div>
    				</form>

    			</div>

    		</div>
    	</div>
    	
    </section>







<div class="footer">
  <h6>E-Pharmacy</h6>
  Copyright &copy; E-Pharmacy
</div>


  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    -->
  </body>
</html>
