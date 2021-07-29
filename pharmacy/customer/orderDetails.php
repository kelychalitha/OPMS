<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
if(!isset($_SESSION['token'])){
    header('Location: ../index.html');
}
else
{
    include '../controllers/apiConfig.php';
    $token= $_SESSION['token'];
    $email= $_SESSION['email'];
    $fname= $_SESSION['fname'];
    $lname= $_SESSION['lname'];
    $image= $_SESSION['image'];
    $cid= $_SESSION['pid'];
} ?>
<head>
    <meta charset="utf-8">
    <title>Customer Profile</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/style.css">

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
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Supplier Contact</th>
                    <th>Total</th>
                    <th>Order status</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>

                   <?php

                   $url= $apiUrl."precription/customerPrecription/".$cid;
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
                           echo "<tr><td>".  $value["_id"]. "</td><td> ". $value["date"]. "</td><td> ". $value["pcontact"]. "</td><td> ". $value["total"]. "</td><td> "
                               . $value["status"]."</td><td> "; ?>

                           <form action="../pdf/pdf.php" method="post">
                               <input type="hidden" name="id" value="<?php echo ($value["_id"]);?>">
                               <input type="hidden" name="address" value="<?php echo ($value["address"]);?>">
                               <input type="hidden" name="email" value="<?php echo ($value["email"]);?>">
                               <input type="hidden" name="phone" value="<?php echo ($value["phone"]);?>">
                               <input type="hidden" name="pname" value="<?php echo ($value["pname"]);?>">
                               <input type="hidden" name="pcity" value="<?php echo ($value["pcity"]);?>">
                               <input type="hidden" name="pcontact" value="<?php echo ($value["pcontact"]);?>">
                               <input type="hidden" name="status" value="<?php echo ($value["status"]);?>">
                               <input type="hidden" name="payment" value="<?php echo ($value["payment"]);?>">
                               <input type="hidden" name="details" value="<?php echo ($value["details"]);?>">
                               <input type="hidden" name="total" value="<?php echo ($value["total"]);?>">
                               <input type="hidden" name="date" value="<?php echo ($value["date"]);?>">
                               <input type="submit" name="data" value="Download Invoice">
                           </form>

                           <?php echo "</td></tr>";


                       }

                   }

                   else{
                       echo "No Data Found";
                       exit();
                   }


                   ?>

            </tbody>
            <tfoot>
                <tr>

                </tr>
            </tfoot>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

    <script>
        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/

        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function (e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
            }
        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
    </script>

</body>

</html>
