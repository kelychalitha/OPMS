<?php
include '../apiConfig.php';
if (isset($_POST['update'])) {

    $id =$_POST['id'];
    $email =$_POST['email'];
    $status = $_POST['status'];
    $detail= $_POST['detail'];
    $total = $_POST['total'];

// The data to send to the API
    $postData = array(
        'id' => $id ,
        'email' => $email,
        'status' => $status,
        'detail' => $detail,
        'total' => $total



    );
// Setup cURL
    $url = $apiUrl.'precription/updateOrder';
    $data_json = json_encode( $postData );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);

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
       // echo ($detail);
        header("Location:../../supplier/supplier_dashboard.php");

        exit();
    }
    else
    {
        echo("Add Failed");
    }


}
?>
