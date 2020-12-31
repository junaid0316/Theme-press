<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $subject = $_POST['subject'];
        $cars = $_POST['cars'];
        $msg = $_POST['msg'];

        require 'PHPmailer/PHPMailer-5.2-stable/PHPMailerAutoload.php';
        require 'PHPmailer/PHPMailer-5.2-stable/class.phpmailer.php';
        require 'PHPmailer/PHPMailer-5.2-stable/class.smtp.php';

        $mail = new PHPMailer();

        $mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'youremail@gmail.com';                 // SMTP username
        $mail->Password = 'yourpassword';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('youremail@gmail.com', 'DMM');
        $mail->addAddress($_POST['email']);     // Add a recipient
        $mail->addReplyto('YourEmail@gmail.com');

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['email'];
        $mail->Body    = ".Name: ".$name.".\n\nEmail: ".$email.".\nNumber: ".$number.".\nSubject: ".$subject.".\nProblem: ".$cars.".\nMessage: ".$msg;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if($mail->send()) {
            echo 'Message has been sent';
        } else {
            echo 'Message has not been sent';
        }
    }
?>