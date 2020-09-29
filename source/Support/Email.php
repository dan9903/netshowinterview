<?php

namespace Source\Support;

class Email {
  public function sendMail($userData= [] ) {
    $to = MAIL_TO;
    $subject = 'Novo usuario Cadastrado no sistema';
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= 'From: support@support.com>' . "\r\n";
    // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $messsage = $this->setMailData($userData, $mime_boundary);
  
    $mail = @mail($to,$subject,$message,$headers);
    var_dump($mail);
  }
  
  private function setMailData($userData = [], $mime_boundary) {
    $message = 'Estes são os dados do novo usuário:<br/>
      NOME:'.$userData['name'].'<br/>
      EMAIL: '.$userData['email'].'<br/>
      TELEFONE: '.$userData['phone'].'<br/>
      MENSAGEM: '.$userData['message'].'<br/>';

    return $this->addAttachment($message, $userData['document'], $mime_boundary);
  }

  private function addAttachment($message, $file, $mime_boundary) {
    if(!empty($file) > 0){ 
      if(is_file($file)){
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 

        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
      } 
    }
    return $message;
  }
}
