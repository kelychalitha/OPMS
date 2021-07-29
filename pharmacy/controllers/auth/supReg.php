<?php
include '../apiConfig.php';
if (isset($_POST['signup'])) {

    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $phone = $_POST['phone'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $address = $_POST['address']. " " . $_POST['address2'];
    $city= $_POST['city'];
    $password = $_POST['password'];
    $image_name = $_FILES["file"]["name"];
    $image_type = $_FILES["file"]["type"];
    $file_temp_name = $_FILES["file"]["tmp_name"];
    $path = move_uploaded_file($file_temp_name, $apiPath."/uploads/supplier/".$nic.$image_name);
    $image_nic = $_FILES["nicImg"]["name"];
    $image_type_nic = $_FILES["nicImg"]["type"];
    $file_temp_name_nic = $_FILES["nicImg"]["tmp_name"];
    $path_nic = move_uploaded_file($file_temp_name_nic , $apiPath."/uploads/supnic_".$nic.$image_nic);


// The data to send to the API
    $postData = array(
        'fname' => $fname ,
        'lname' => $lname,
        'phone' => $phone,
        'phone2' => $phone2,
        'email' => $email,
        'nic' => $nic,
        'address' => $address,
        'city' => $city,
        'image' => $nic.$image_name,
        'nicImg' => $image_nic,
        'password' => $password,


    );
// Setup cURL
    $url = $apiUrl.'auth/supplier/signup';
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

        //echo ($fname . $lname);
       header("Location:../../index.html");

        exit();
    }
    else
    {
        echo("Add Failed");
    }


}
?>
