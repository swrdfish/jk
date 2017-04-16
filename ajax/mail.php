<?php 
    require 'PHPMailerAutoload.php';

    // GET FORM DATA
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];


    // SEND CONFIRMATION MAIL TO CLIENT

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                                 // Enable verbose debug output

    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->SMTPDebug = 3;                                   // Enable debug
    $mail->Host = 'mail.jhinukconstructions.in';            // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = 'jarvis@jhinukconstructions.in';      // SMTP username
    $mail->Password = 'Suvro007@#';                         // SMTP password
    // $mail->SMTPSecure = 'nosecure';                              // Enable TLS encryption, `ssl` also accepted
    // $mail->SMTPOptions = array(                             // Disable certificate check
    //     'tls' => array(
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => true
    //     )
    // );
    $mail->SMTPAutoTLS = false;
    $mail->Port = 587;                                      // TCP port to connect to

    $mail->setFrom('jarvis@jhinukconstructions.in', 'Jarvis');
    $mail->addAddress($email, $name);     // Add a recipient
    $mail->addReplyTo('info@jhinukconstructions.in', 'Information');

    $mail->isHTML(true);                                    // Set email format to HTML

    $mail->Subject = 'Welcome';
    $mail->Body    = '<span style="font-size: 1.2em">Thank you for choosing a better lifestyle. We will get back to you shortly. </span><div style="margin-top: 70px"><img width="100px" src="http://www.jhinukconstructions.in/img/logo_dark.png" /><div style="margin-left: 20px; color: #828282"><br>JHINUK CONSTRUCTIONS,<br>SuperMarket, Block B,<br>Bolpur, Birbhum,<br>PIN: 731204<br><br>Phone: 03463-252512</div></div>';
    $mail->AltBody = 'Thank you for choosing a better lifestyle. We will get back to you shortly. - JHINUK CONSTRUCTIONS ';

    if(!$mail->send()) {
        echo 'Message could not be sent to client.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent to client';
    }




    // SEND MAIL TO ADMIN

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                                 // Enable verbose debug output

    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->SMTPDebug = 3;                                   // Enable debug
    $mail->Host = 'mail.jhinukconstructions.in';            // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = 'jarvis@jhinukconstructions.in';      // SMTP username
    $mail->Password = 'Suvro007@#';                         // SMTP password
    // $mail->SMTPSecure = 'nosecure';                              // Enable TLS encryption, `ssl` also accepted
    // $mail->SMTPOptions = array(                             // Disable certificate check
    //     'tls' => array(
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => true
    //     )
    // );
    $mail->SMTPAutoTLS = false;
    $mail->Port = 587;                                      // TCP port to connect to

    $mail->setFrom('jarvis@jhinukconstructions.in', 'Jarvis');
    // $mail->addAddress('jhinukconstructions@gmail.com', 'Jhinuk Constructions');     // Add a recipient
    $mail->addAddress('ghoshbishakh@gmail.com', 'Bishakh Ghosh');     // Add a recipient
    $mail->addReplyTo('info@jhinukconstructions.in', 'Information');

    $mail->isHTML(true);                                    // Set email format to HTML

    $mail->Subject = 'Query from jhinukconstructions.in';
    $mail->Body    = '' . $comment . '-------------------<br> Sender: ' . $name . "<br>" . $email . "<br>" . $contact;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent to admin';
    }
?>