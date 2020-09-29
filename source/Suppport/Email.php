<?php

namespace Source\Suppport;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email {
  private $mail;


  public function __construct() {
    $this->mail = new PHPMailer(true);
    $this->mail->isSMTP();
    $this->mail->isHTML(true);
    $this->mail->setLanguage("br");
    $this->mail->Charset = "UTF-8";
    $this->mail->SMTPAuth   = true;
    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $this->mail->Host       = MAIL['host'];
    $this->mail->Username   = MAIL['user'];
    $this->mail->Password   = MAIL['password'];
    $this->mail->Port       = MAIL['port'];
  }

  public function sendMail($userData= [] ) {
    try {
      $this-setMailData($userData);
      $this->mail->setFrom(MAIL['from_email'], MAIL['from_name']);
      $this->mail->send();
      return true;  
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
    }
  }
  
  private function setMailData($userData = []) {
    $this->mail->addAttachment($userData['document']);
    $this->mail->Subject = 'Novo usuario Cadastrado no sistema'; 
    $this->mail->Body = 'Estes são os dados do novo usuário:<br/>
          NOME:'.$userData['name'].'<br/>
          EMAIL: '.$userData['email'].'<br/>
          TELEFONE: '.$userData['phone'].'<br/>
          MENSAGEM: '.$userData['message'].'<br/>';
  }
}