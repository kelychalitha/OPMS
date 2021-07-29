<?php
include '../apiConfig.php';

if (isset($_POST['submit'])) {
    $id =$_POST['id'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = ((isset($_POST['password1']) && !empty($_POST['password1']))?$_POST['password']:'');
    $image_name = NULL;
    $image_type = NULL;
    $file_temp_name = NULL;
    $path = NULL;

    //die('Nir izt: '.$_SESSION['nir']. ' och ze picture izt: <pre>'.print_r($_FILES,TRUE).'</pre>');

    $no_picture_update = FALSE;
    if(!isset($_FILES["file"]["name"])==TRUE || empty($_FILES["file"]["name"])==TRUE){
        $no_picture_update = TRUE;
        $image_name = ((isset($_POST['current_pic']) && !empty($_POST['current_pic']))?$_POST['current_pic']:'');
    }else{
        $image_name = $_FILES["file"]["name"];
        $image_type = $_FILES["file"]["type"];
        $file_temp_name = $_FILES["file"]["tmp_name"];
        $path = move_uploaded_file($file_temp_name, $apiPath."/uploads/supplier/".$_SESSION['nir'].$image_name);
    }

// The data to send to the API
    $userData = array(
        'fname' => $fname ,
        'lname' => $lname,
        'phone' => $phone,
        'email' => $email,
        'address' => $address,
        'image' => $image_name,
        'password' => $password,
        'id' => $id
    );


    $url = $apiUrl."auth/updateSupplier/";
    $data_json = json_encode($userData);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);


// Decode the response
    $responseData = json_decode($response, TRUE);

// Print the date from the response
    if($responseData == "success"){
        echo("Results Update failed");
        exit();
    }
    else
    {


    header("Location:logout.php");
        exit();

    }
}
?>
