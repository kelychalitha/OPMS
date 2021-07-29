
<?php
include '../apiConfig.php';
if (isset($_POST['Login'])) {
    session_start();
    unset($_SESSION["token"]);
    unset($_SESSION["image"]);
    $email =$_POST['email'];
    $password =$_POST['password'];

// login data  send to the API
    $postData = array(
        'password' => $password,
        'email' => $email,
    );

// Setup cURL
// Setup cURL
    $ch = curl_init($apiUrl.'auth/customerlogin');
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

// Check for errors
    if($response === FALSE){
        die(curl_error($ch));
        echo 'Dead';
    }

// Decode the response
    $responseData = json_decode($response, TRUE);
    //die(var_dump($responseData));

// Print the date from the response
    if(!empty($responseData) && isset($responseData['token'])==TRUE && !empty($responseData['token']) && $responseData['token'] != NULL   ){
        $token = $responseData['token'];
        $id = $responseData['id'];
        $email= $responseData['email'];
        $lname= $responseData['lname'];
        $fname= $responseData['fname'];
        $image = $responseData['nic'].$responseData['image'];
        $address = $responseData['address'];
        $city = $responseData['city'];
        $_SESSION["token"] =$token;
        $_SESSION['email'] =$email;
        $_SESSION['fname'] =$fname;
        $_SESSION['lname'] =$lname;
        $_SESSION['image'] =$image;
        $_SESSION['pid'] =$id;
        $_SESSION['addr'] =$address;
        $_SESSION['cty'] =$city;
        $_SESSION['pno'] = $responseData['phone'];
        $_SESSION['nir'] = $responseData['nic'];
        //echo ($image);
        header("Location:../../customer/customer_dashboard.php");
        exit();
    }
    else{

        echo '<script language="javascript">';
        echo 'alert("Login error");';
        echo 'window.location.href="../../index.html";';
        echo '</script>';
        exit();
    }

}
?>
