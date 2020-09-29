<?php
namespace Source\Controllers;

use \Source\Models\Candidate;
use \Source\Support\Email;

class CandidateController {
  private $userData = [];
  private $mail;

  public function __construct() {
    $this->mailer = new Email();
  }
  
  public function save( $params =[] ) {
    if ($this->validateData($params)) {
      $candidate = new Candidate (
        $this->userData['name'],
        $this->userData['email'],
        $this->userData['phone'],
        $this->userData['message'],
        $this->userData['document'],
        $this->userData['ipAddress']
      );
      $candidate->save();
      $this->mailer->sendMail($this->userData);
      return true; 
    }
  }

  private function validateData($params) {
    if( (!validateEmail($params['post']['email'])) ||
      (!validatePhone($params['post']['phone']))) {
        return false;
    }

    $this->userData = [
      'name' => sanitize($params['post']['name']),
      'email' => $params['post']['email'],
      'phone' => removePhoneMask($params['post']['phone']),
      'message' => sanitize($params['post']['message']),
      'document' => storeFile($params['document']),
      'ipAddress' => getUserIpAddr()
    ];
    return true;
  }

}
