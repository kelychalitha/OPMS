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
    $add= $_SESSION['addr'];
    $phno= $_SESSION['pno'];
} ?>
<head>
  <meta charset="utf-8">
  <title>Customer Profile</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style5.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
        <a href="../controllers/auth/logout.php" class="logout_btn">Logout</a>
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
    <div class="div3">
      <form action="../controllers/auth/cusUpdate.php" enctype="multipart/form-data" method="POST">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" value="<?php echo ($fname)?>" placeholder="Enter First Name..">
          <input type="hidden" id="fname" name="id" value="<?php echo ($cid)?>">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" value="<?php echo ($lname)?>" placeholder="Enter Last Name..">

        <label for="psw">Current Password</label>
        <input type="password" id="password" name="password1"  placeholder="Enter Password.." required>

        <hr>
        <label for="psw">New Password</label>
        <input type="password" id="psw" name="password" placeholder="Enter Password.."
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
          title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        <div id="message">
          <h3>Password must contain the following:</h3>
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
        <hr>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo ($email)?>" placeholder="Enter Email.."
          pattern="((?!\.)[\w-_.]*[^.])(@\w+)(\.\w{1,10}(\.\w{1,10})?[^.\W])">

        <p>Edit your Profile Picture</p>
        <div class="file-upload" style="background-color: rgb(178, 236, 18);" id="file-upload"
          onclick="document.getElementById('input-file').click();">
          <i class="far fa-file-excel"></i> Select image (Click Here)
        </div>
        <input type="file" style="display: none;" name="file" id="input-file" accept="all"
          onchange="select_file_name('input-file');" />


        <hr>

        <label for="contact_number">Contact Number</label>
        <input type="text" id="contact_number" value="<?php echo ($phno)?>" name="phone" placeholder="Enter Contact Number..">

        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="<?php echo ($add)?>" placeholder="Enter Address..">



        <input type="submit" class="button" name="submit" value="Update">
      </form>

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
  <script type="text/javascript">

    function _(id) {
      return document.getElementById(id);
    }

    function select_file_name(id) {
      var filename = _(id).files[0].name;
      if (filename.length > 20) {
        filename = filename.substring(0, 20) + '...'
      };
      _('file-upload').innerHTML = '-> ' + filename;
      _('file-upload').style.backgroundColor = '#1dd1a1'
    }

  </script>
  <!--password validations start-->
  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>
  <!--password validations end-->




</body>

</html>
