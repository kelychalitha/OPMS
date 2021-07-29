<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--Created By Kely weerasooriya-->
<html lang="en">
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
    $cid= $_SESSION['pid'];

}

if (isset($_POST['order'])) {

    $id= $_POST['oid'];
    $date = $_POST['date'];
    $emailo = $_POST['email'];
    $address = $_POST['address'];
    $img = $_POST['img'];
    $total = $_POST['total'];
}
?>
<head>
    <meta charset="utf-8">
    <title>Paper Stack</title>
    <link rel="stylesheet" type="text/css" href="../css/descr.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          crossorigin="anonymous">
    <!--<script src="pdf.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <style>
        .imgs{
            width: 40%;
        }
    </style>

    <?php  $pos = strpos($img, 'http');

        if ($pos === false) {
            $imgpath=  file_get_contents($apiPath.'/uploads/prescriptions/'.$img);
    $imgCode = base64_encode($imgpath);
        }else{
            $imgUrl = $img;
            
        }

    ?>
</head>

<body>
<div class="container">

    <section id="content">

            <h1>Order Details</h1>




            <div class="div3">     <form action="../controllers/supplier/email.php" method="post">
                <p><b>Order Date:</b><?php echo ($date)?></p></br>
                <p><b>Billing Address:</b><?php echo ($address)?></p></br>
                <p><b>Email:</b><?php echo ($emailo)?></p></br>
                    <p><b>Set OrderStatus:</b><select class="form-select form-select-sm" name="status" aria-label=".form-select-sm example">
                            <option selected>pending</option>
                            <option >Canceled</option>
                            <option >Completed</option>
                        </select></p></br>
                <p><b>Order Details add:</b>  <textarea rows="5" name="detail" style="width: 100%"> </textarea></p></br>
                <p><b>Total Price:</b><input type="number" name="total" >   <input type="hidden" name="id" value="<?php echo ($id)?>" >

                    <input type="hidden" name="email" value="<?php echo ($emailo)?>">
                    <button type="submit" name="update" class="btn btn-danger">Send</button></p></br>





                </form>
                <a target="_blank" href="#" onClick='test(this)'>

                    <image class="imgs" src="<?= ((isset($imgUrl)&&!empty($imgUrl))?$imgUrl:'data:image/jpg;charset=utf-8;base64,'.$imgCode) ?>" width="auto"/>
                </a>
            </div>


            <div>


    </section><!-- content -->
</div><!-- container -->

<script>
    function test(element) {
        var newTab = window.open();
        setTimeout(function() {
            newTab.document.body.innerHTML = element.innerHTML;
        }, 500);
        return false;
    }
</script>
</body>

</html>
