<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    private $mail = \stdClass::class;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        //Server settings
        $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.hostinger.com.br';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'edimarbarros@hode.com.br';
        $this->mail->Password   = '';
        $this->mail->SMTPSecure = 'tsl';
        $this->mail->Port       = 587;
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom('edimarbarros@hode.com.br', 'Edimar Barros');
    }

    public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName) {
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch(Exception $e) {
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}