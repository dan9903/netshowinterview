<?php
namespace Source\Controllers;

require __DIR__ .'/../functions/Utils.php';
use \Source\Models\Candidate;

class CandidateController {
  private $userData = [];
  
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
      return true; 
    }
  }

  private function validatedata($params) {
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

