<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
if(!isset($_SESSION['token'])){
    header('Location: ../index.html');
}
else
{
    $token= $_SESSION['token'];
    $email= $_SESSION['email'];
    $fname= $_SESSION['fname'];
    $lname= $_SESSION['lname'];
    $image= $_SESSION['image'];
    $cid= $_SESSION['pid'];
} ?>
<head>
  <meta charset="utf-8">
  <title>Online Payment</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/cus_dash.css">
  <link rel="stylesheet" href="../css/payment1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <!--end-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>

</head>

<body>
  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check">
      <i class="fa fa-bars" aria-hidden="true" id="sidebar_btn"></i>


    </label>
    <div class="left-area">
      <img src="../images/logo.jpg">
    </div>
    <div class="right-area">
      <a href="#" class="logout_btn">Logout</a>
    </div>
  </header>
  <!--header area end-->
  <!--sidebar start-->
  <div class="sidebar">
      <center>
          <img src="../uploads/customer/<?php echo ($image)?>" class="profile_image" class="center" alt="customer profile image">
          <h4><?php echo ($fname)?></h4>
      </center>
      <a href="customer_dashboard.php"><i class="fa fa-desktop" aria-hidden="true"></i><span>Dashboard</span></a>
      <a href="pharmacies.php"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Pharmacies</span></a>
      <a href="orderDetails.php"><i class="fa fa-history" aria-hidden="true"></i><span>Medicine History</span></a>
      <a href="about_us.php"><i class="fa fa-info-circle" aria-hidden="true"></i><span>About Us</span></a>
      <a href="customer_profile_settings.php"><i class="fa fa-sliders-h"
                                                 aria-hidden="true"></i><span>Settings</span></a>

  </div>
  <!--sidebar end-->
  <div class="content">
  <div style="width: 100%">
      <h4>Please add your payment details here to continue your order</h4>
  </div>
    <div class="row">
      <div class="col-50">
        <div class="container2">
          <form action="/action_page.php">

            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com">
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York">

                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY">
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001">
                  </div>
                </div>
                <div id="paypal-button"></div>
              <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                </div>
            </div>
              
          </form>
          
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

  

  <script>
    paypal.Button.render({
      // Configure environment
      env: 'sandbox',
      client: {
        sandbox: 'demo_sandbox_client_id',
        production: 'demo_production_client_id'
      },
      // Customize button (optional)
      locale: 'en_US',
      style: {
        size: 'large',
        color: 'black',
        shape: 'rect',
      },

      // Enable Pay Now checkout flow (optional)
      commit: true,

      // Set up a payment
      payment: function (data, actions) {
        return actions.payment.create({
          transactions: [{
            amount: {
              total: '0.01',
              currency: 'USD'
            }
          }]
        });
      },
      // Execute the payment
      onAuthorize: function (data, actions) {
        return actions.payment.execute().then(function () {
          // Show a confirmation message to the buyer
          window.alert('Thank you for your purchase!');
        });
      }
    }, '#paypal-button');

  </script>


</body>

</html>
