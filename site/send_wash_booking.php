<?php
if(isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "idorofeeva@gmail.com";
    $email_subject = "Car Wash Booking Form from waxxd.net";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['Name']) ||

        !isset($_POST['Email']) ||

        !isset($_POST['Phone']) ||

        !isset($_POST['Address']) ||

        !isset($_POST['Date']) ||

        !isset($_POST['Time']) ||

        !isset($_POST['Car']) ||

        !isset($_POST['Package'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $phone = $_POST['Phone']; // required
    $address = $_POST['Address']; // required
    $date = $_POST['Date']; // required
    $time = $_POST['Time']; // required
    $car = $_POST['Car']; // required
    $package = $_POST['Package']; // required



    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }


  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Car Wash Booking Form from waxxd.net, see details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Address: ".clean_string($address)."\n";
    $email_message .= "Date: ".clean_string($date)."\n";
    $email_message .= "Time: ".clean_string($time)."\n";
    $email_message .= "Car: ".clean_string($car)."\n";
    $email_message .= "Package: ".clean_string($package)."\n";

// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

Thank you for booking a car wash with us! We will be in touch with you very soon.


<a href="index.html" style="font-size: 20px; color: #232123;">Back To Site</a>


<?php

}
?>
