<?php

namespace App\Controllers;

use App\Models\Mails;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailControllers
{
    function sendMail($mail)
    {
        $mail = new Mails($mail);
        $mail = $mail->sendMail($mail);
        header('Location: index.php');
    }
}
