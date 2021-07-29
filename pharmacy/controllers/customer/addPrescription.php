<?php
include '../apiConfig.php';
if (isset($_POST['add'])) {

    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pname = $_POST['pname'];
    $pid= $_POST['pid'];
    $pemail = $_POST['pemail'];
    $pcontact = $_POST['pcontact'];
    $pcity = $_POST['pcity'];
    $cid = $_POST['cid'];
    $image_name = $_FILES["file"]["name"];
    $image_type = $_FILES["file"]["type"];
    $file_temp_name = $_FILES["file"]["tmp_name"];
    $path = move_uploaded_file($file_temp_name, $apiPath."/uploads/prescriptions/".$cid.$image_name);
    $location= $apiPath."/uploads/";
    $detination = "D:/Flutter/parmacy/assets/images/";
    copy($path , $detination);
//    $image_name_flutter = $_FILES["file"]["name"];
//    $image_type_flutter = $_FILES["file"]["type"];
//    $file_temp_name_flutter = $_FILES["file"]["tmp_name"];
//    $pathf = move_uploaded_file($file_temp_name_flutter, "D:/Flutter/parmacy/assets/images/".$image_name_flutter);


// The data to send to the API
    $postData = array(
        'fname' => $fname ,
        'lname' => $lname,
        'address' => $address,
        'email' => $email,
        'phone' => $phone,
        'pid' => $pid,
        'pname' => $pname,
        'pcity' => $pcity,
        'pcontact' => $pcontact,
        'image' => $image_name,
        'cid' => $cid,


    );
// Setup cURL
    $url = $apiUrl.'precription/AddPrecription';
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

// Send the request
    $response = curl_exec($ch);
    echo $response;


// Check for errors
    if($response === FALSE){
        die(curl_error($ch));
        echo 'Dead';
    }

// Decode the response
    $responseData = json_decode($response, TRUE);

// Print the date from the response
    if($responseData != null){
        header("Location:../../customer/customer_dashboard.php");

        exit();
    }
    else
    {
        echo("Add Failed");
    }


}
?>
