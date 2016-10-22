<?php
if (isset($_POST['contact-us-name'])) {
    if ($_POST['contact-us-name'] != '' && $_POST['contact-us-mail'] != '' && $_POST['contact-us-message'] != '') {
        $message_content = '';
        $detect_errors = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Mail Submitted From: ' . $_SERVER['HTTP_REFERER'] : '';

        $receiver_mail = get_option('admin_email');
        $poss_name = get_option('blogname'); // Name is optional
        $client_name = isset($_POST['contact-us-name']) ? trim($_POST['contact-us-name']) : '';
        $client_email = isset($_POST['contact-us-mail']) ? trim($_POST['contact-us-mail']) : '';
        $client_phone = isset($_POST['contact-us-phone']) ? trim($_POST['contact-us-phone']) : '';        
        $client_subject = isset($_POST['contact-us-subject']) ? trim($_POST['contact-us-subject']) : 'Message From WebHunt Infotech Contact Form';
        $client_message = isset($_POST['contact-us-message']) ? stripslashes(trim($_POST['contact-us-message'])) : '';

      $headers = "Reply-To: " . trim($_POST['contact-us-name']) . " <" . trim($_POST['contact-us-mail']) . ">\r\n";
      $headers .= "Return-Path: " . trim($_POST['contact-us-name']) . " <" . trim($_POST['contact-us-mail']) . ">\r\n";
      $headers .= "From: " . trim($_POST['contact-us-name']) . " <" . trim($_POST['contact-us-mail']) . ">\r\n";
      $headers .= "Organization: " . get_option("blogname") . " \r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
      $headers .= "X-Priority: 3\r\n";
      $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";


        $client_name = $client_name!="" ? 'Name: ' . $client_name : '';
        $client_email = $client_email!="" ? 'Email: ' . $client_email : '';
        $client_phone = $client_phone!="" ? 'Phone: ' . $client_phone : '';
        $client_service = $client_subject!="" ? 'Subject: ' . $client_subject : '';
        $client_message = $client_message!="" ? 'Message: ' . $client_message : '';

        $message_content .= $client_name .'<br>'. $client_email .'<br>'. $client_phone .'<br>'. $client_service .'<br>'. $client_message;
        $message_content .= $detect_errors;

        if (wp_mail($receiver_mail, $client_subject, $message_content, $headers)) {
            echo 'Your message has been <strong>successfully</strong> sent, We will send you a reply as soon as possible.';
            die;
        } else {
            echo 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.';
            die;
        }

    }
}