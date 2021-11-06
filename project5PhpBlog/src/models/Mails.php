<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Blogs;

class Mails extends Blogs
{
    private $firstName;
    private $lastName;
    private $email;
    private $subject;
    private $message;

    public function setFirstName($firstName)
    {
        if (is_string($firstName)) {
            $this->firstName = $firstName;
        }
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setLastName($lastName)
    {
        if (is_string($lastName)) {
            $this->lastName = $lastName;
        }
    }
    public function getlastName()
    {
        return $this->lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setSubject($subject)
    {
        if (is_string($subject)) {
            $this->subject = $subject;
        }
    }
    public function getSubject()
    {
        return $this->subject;
    }

    public function setMessage($message)
    {
        if (is_string($message)) {
            $this->message = $message;
        }
    }
    public function getMessage()
    {
        return $this->message;
    }

    public function sendMail($mail)
    {
        $mail = new PHPMailer($mail);
        try {
            $mail->isSMTP();
            $mail->Host = filter_var($_ENV["MAIL_HOST"], FILTER_SANITIZE_STRING);
            $mail->SMTPAuth = true;
            $mail->Port = filter_var($_ENV["MAIL_PORT"], FILTER_SANITIZE_STRING);
            $mail->Username = filter_var($_ENV["MAIL_USERNAME"], FILTER_SANITIZE_STRING);
            $mail->Password = filter_var($_ENV["MAIL_PASSWORD"], FILTER_SANITIZE_STRING);

            $mail->setFrom('pelgrims.chenchingyi@gmail.com', 'ChingYi PC');
            $mail->addAddress($this->getEmail(), $this->getFirstName());
            $mail->addCC('pelgrims.chenchingyi@gmail.com', 'ChingYi PC');

            $mail->isHTML(true);
            $mail->Subject = 'We have received your message';
            $mail->addEmbeddedImage('public/img/logo.png','logo');
            $bodyParagraphs = ["Thank you for your message.We will get back to you shortly.", "",  "", '<img src="cid:logo" width="20%">', "","First Name: {$this->getFirstName()}", "Last Name: {$this->getLastName()}", "Email: {$this->getEmail()}", "Subject: {$this->getSubject()}", "Message:", nl2br($this->getMessage())];
            $body = join('<br />', $bodyParagraphs);
            $mail->Body = $body;
            $mail->send();
            session_start();
            Session::set('success_message',"Your contact form is sent successfully.Thank you for contacting us.");
        } catch (Exception $e) {
            session_start();
            Session::set('error',"Oops, something went wrong. Please try again later.");
        }
    }
    function sendResetPasswordEmail($user){
        $mail = new PHPMailer($user);
        $userEmail=$user->getEmail();
        $userToken=$user->getResetToken();
        try {
            $mail->isSMTP();
            $mail->Host = filter_var($_ENV["MAIL_HOST"], FILTER_SANITIZE_STRING);
            $mail->SMTPAuth = true;
            $mail->Port = filter_var($_ENV["MAIL_PORT"], FILTER_SANITIZE_STRING);
            $mail->Username = filter_var($_ENV["MAIL_USERNAME"], FILTER_SANITIZE_STRING);
            $mail->Password = filter_var($_ENV["MAIL_PASSWORD"], FILTER_SANITIZE_STRING);


            $mail->setFrom('pelgrims.chenchingyi@gmail.com', 'ChingYi PC');
            $mail->addAddress($user->getEmail(), $user->getFirstName());
            $mail->isHTML(true);
            $mail->Subject = 'Reset password';
            $mail->addEmbeddedImage('public/img/logo.png','logo');
            $body = 
            "<p>Please click the link below to reset your password.<p><br>
            <a href='http://localhost/project5PhpBlog/index.php?action=resetPasswordMail&email=$userEmail&reset_token=$userToken'>click here</a><br><br>
            <img src='cid:logo' width='20%'>";
            $mail->Body = $body;
            $mail->send();
            session_start();
            Session::set('successmessage',"We have sent you an Email to reset the password. Please check your mail box.");
        } catch (Exception $e) {
            session_start();
            Session::set('error',"Oops, something went wrong. Please try again later.");
        }



    }
}
