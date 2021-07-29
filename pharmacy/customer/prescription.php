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
    <title>Order Medicine</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style5.css">  

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

   
    
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
        <div id="example1">
            <h2><em>Supplier is: </em></h2><br />
            <?php
            if (isset($_POST['supplier'])) {
                $name = $_POST['fname']. " " . $_POST['lname'];
                $contact = $_POST['phone'];
                $pemail = $_POST['email'];
                $city = $_POST['city'];
                $pid= $_POST['id'];
            ?>
            <div id='sup_name'><b>Name: </b><?php echo ($_POST['fname']. " " . $_POST['lname']);?></div><br />
            <div id='sup_phone'><b>Contact: </b><?php echo ($_POST['phone']);?></div><br />
            <div id='sup_mail'><b>Email: </b><?php echo ($_POST['email']);?></div><br />
            <div id='sup_addr'><b>City:  </b><?php echo ($_POST['city']); }?>    </div><br />
        </div><br /><br/>
        <div class="div3">
            <h2>Order Medicine</h2>
        <form action="../controllers/customer/addPrescription.php" method="post"  enctype="multipart/form-data">
            <label for="fname">First Name</label>
            <input required type="text" id="fname" name="fname" disabled value="<?=$fname ?>">
            <input required type="hidden" id="fname" name="fname" value="<?=$fname ?>">
            <label for="lname">Last Name</label>
            <input required type="text" id="lname" name="lname" disabled value="<?=$lname ?>">
            <input  type="hidden" id="lname" name="lname" value="<?=$lname ?>">
            <label for="billing_address">Billing Address</label>
            <input required type="text" id="billing_address" name="address" placeholder="Enter billing_address..">

            <label for="email">Email</label>
            <input required type="text" id="email" name="email" placeholder="Enter Email..">
            <p>Add your prescription photo</p>
                <input type="file"  id="myFile" name="file">
                <hr>
            <input required type="hidden" id="fname" name="pid" value="<?=$pid ?>">
            <input required type="hidden" id="fname" name="pname" value="<?=$name ?>">
            <input required type="hidden" id="fname" name="pemail" value="<?=$pemail ?>">
            <input required type="hidden" id="fname" name="pcontact" value="<?=$contact ?>">
            <input required type="hidden" id="fname" name="pcity" value="<?=$city ?>">
            <input required type="hidden" id="fname" name="cid" value="<?=$cid ?>">
            <label for="contact_number">Contact Number</label>
            <input required type="text" id="contact_number" name="phone" placeholder="Enter Contact Number..">

            <input type="submit" class="button" name="add" value="Submit">
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




</body>

</html>
