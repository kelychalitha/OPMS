<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/contactus.css">
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
                    <li class="nav-item"><a href="contactus.php" class="nav-link active">Contact Us</a></li>
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
                            <a class="dropdown-item" href="login-admin.php">Admin</a>
                        </div>

                    </li>
                </ul>
            </div> 
        </div>
    </nav>












 <section class="Form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
         <!--  <div class="col-lg-1">
            <img src="b.png" class="img-fluid" alt="">
          </div>
 -->
        
        <!-- <div class="col-lg-3 my-5 mx-1">
            <img src="c2.jpg" class="img-fluid" alt="">
        </div> -->

        <div class="col-lg-5">
            <img src="images/3.jpg" class="img-fluid" alt="">
            <p><center>If you have Questions or just<br>want to get in touch, use the<br>form below. We look forward to<br>hearing from you!<br><br></center></p>
            <h6><center>Contact No:076-4720883<br>E-mail: epharmacy1507@gmail.com</center></h6>
          </div>
    






          <div class="col-lg-7 px-5 pt-5">
           <!--  <h1 class="font-weight-bold py-3">Contact Us</h1> -->
           
            <form action="controllers/customer/addMessage.php" method="POST">
              <div class="form-row">
                <div class="col-lg-5">
                  <label>Your Name: </label>
                  <input type="text" placeholder="Enter your name" class="form-control my-2 p-2" name="name">
                </div>

              </div>

                <div class="form-row">
                <div class="col-lg-7">
                  <label>E-mail: </label>
                  <input type="E-mail" placeholder="Enter your E-mail" class="form-control my-2 p-2" name="email" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*">
                </div>

              </div>

              


              <div class="form-group">
                <label>Message:</label>
                <textarea class="form-control" name="message" placeholder="Enter your Message" id="exampleFormControlTextarea1" rows="4"></textarea>
              </div>


                <div class="form-row">
                <div class="col-lg-7 mb-4 mt-4">
                  <input class="btn btn-success" type="submit" name="submit" class="btn1">
                  
                </div>

              </div> 
              
              

          </div>

        </div>
      </div>
      
    </section>













<div class="footer">
  <h6>E-Pharmacy</h6>
  Copyright &copy; E-Pharmacy
</div>








  </body>
  </html>
