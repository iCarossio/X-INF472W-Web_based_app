<?php

    session_cache_limiter( 'nocache' );
    header( 'Expires: ' . gmdate( 'r', 0 ) );
    header( 'Content-type: application/json' );

    $email_template = 'mail.html';

    $to         = htmlspecialchars($_POST['tomail']);

    $subject    = htmlspecialchars($_POST['subject']);
    $email      = htmlspecialchars($_POST['email']);
    // $phone      = htmlspecialchars($_POST['phone']);
    $name       = htmlspecialchars($_POST['name']);
    $message    = nl2br( htmlspecialchars($_POST['message'], ENT_QUOTES) );

    $result     = array();

    // Recaptacha test :
    $response = $_POST["g-recaptcha-response"];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $secret="6LeK6UwUAAAAACmBr84H6jQDC4cmm_tLzRenTNHz";
    $response=$_POST["g-recaptcha-response"];
    $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success=json_decode($verify);

    if ($captcha_success->success==false) {
            $result = array( 'response' => 'error', 'empty'=>'captcha', 'message'=>'<strong>Error!</strong>&nbsp; Captacha is empty.' );
            echo json_encode($result );
            die;
    } else if ($captcha_success->success==true) {

        if(empty($name)){

            $result = array( 'response' => 'error', 'empty'=>'name', 'message'=>'<strong>Error!</strong>&nbsp; Name is empty.' );
            echo json_encode($result );
            die;
        } 

        if(empty($email)){

            $result = array( 'response' => 'error', 'empty'=>'email', 'message'=>'<strong>Error!</strong>&nbsp; Email is empty.' );
            echo json_encode($result );
            die;
        } 

        if(empty($message)){

             $result = array( 'response' => 'error', 'empty'=>'message', 'message'=>'<strong>Error!</strong>&nbsp; Message body is empty.' );
             echo json_encode($result );
             die;
        }


        $headers  = "From: " . $name . ' <' . $email . '>' . "\r\n";
        $headers .= "Reply-To: ". $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


        $templateTags =  array(
            '{{subject}}' => $subject,
            '{{email}}'=>$email,
            '{{message}}'=>$message,
            '{{name}}'=>$name
            //'{{phone}}'=>$phone
            );


        $templateContents = file_get_contents( dirname(__FILE__) . '/../templates/'.$email_template);

        $contents =  strtr($templateContents, $templateTags);

        if ( mail( $to, $subject, $contents, $headers ) ) {
            $result = array( 'response' => 'success', 'message'=>'<strong>Thank You!</strong>&nbsp; Your email has been delivered.' );
        } else {
            $result = array( 'response' => 'error', 'message'=>'<strong>Error!</strong>&nbsp; Cann\'t send mail.'  );
        }

        echo json_encode( $result );

    }

    die;