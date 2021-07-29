<!DOCTYPE html>
<html lang="en">
  <!--Created By Kely weerasooriya-->
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
      $cty= $_SESSION['cty'];
      $addr= $_SESSION['addr'];
  }

  if (isset($_POST['data'])) {
      $invoice = $_POST['id'];
      $address = $_POST['address'];
      $cemail = $_POST['email'];
      $phone = $_POST['phone'];
      $pname = $_POST['pname'];
      $pcity = $_POST['pcity'];
      $pcontact = $_POST['pcontact'];
      $status = $_POST['status'];
      $payment = $_POST['payment'];
      $details = $_POST['details'];
      $total = $_POST['total'];
      $date = $_POST['date'];
  }



  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
                <div class="card" id="invoice">
                    <div class="card-header bg-transparent header-elements-inline">
                        <h6 class="card-title text-primary">Sale invoice</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">

                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li><?php echo ($pname) ?></li>
                                        <li><?php echo ($pcity) ?></li>
                                        <li><?php echo ($pcontact) ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Invoice <?php echo ($invoice) ?></h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Date: <span class="font-weight-semibold"><?php echo ($date) ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left"> <span class="text-muted">Invoice To:</span>
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h5 class="my-2">Customer</h5>
                                    </li>
                                    <li><span class="font-weight-semibold"><?php echo ($fname. "  " . $lname) ?></span></li>
                                    <li><?php echo ($address) ?></li>
                                    <li><?php echo ($cty) ?></li>
                                    <li><?php echo ($phone) ?></li>
                                    <li><a href="#" data-abc="true"><?php echo ($cemail) ?></a></li>
                                </ul>
                            </div>
                            <div class="mb-2 ml-auto"> <span class="text-muted">Payment Details:</span>
                                <div class="d-flex flex-wrap wmin-md-400">
                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>
                                            <h5 class="my-2">Total Due:</h5>
                                        </li>
                                        <li>Bank name:</li>
                                        <li>Country:</li>
                                        <li>City:</li>
                                        <li>Address:</li>
                                        <li>Account Number:</li>
                                    </ul>
                                    <ul class="list list-unstyled text-right mb-0 ml-auto">
                                        <li>
                                            <h5 class="font-weight-semibold my-2"> <?php echo ($total) ?>    LKR</h5>
                                        </li>
                                        <li><span class="font-weight-semibold">Sampath PLC</span></li>
                                        <li>Sri Lanka</li>
                                        <li>Thurnung street, 21</li>
                                        <li>New standard</li>
                                        <li><span class="font-weight-semibold">98574959485</span></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <div class="details" style="width: 40%;">

                                <?php echo ($details) ?>
                            </div>
                            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                                <h6 class="mb-3 text-left">Total due</h6>
                                <div class="table-responsive">

                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <th class="text-left">Total:</th>
                                                <td class="text-right text-primary">
                                                    <h5 class="font-weight-semibold"><?php echo ($total) ?></h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <div class="card-footer"> <span class="text-muted">Sri lanka jjsjjsjLorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.Duis aute irure dolor in reprehenderit</span> </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
