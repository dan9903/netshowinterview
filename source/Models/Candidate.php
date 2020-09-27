<?php

namespace Source\Models;

use \PDO;
class Candidate extends Model {
  
  private $id;
  private $name;
  private $email;
  private $phone;
  private $message;
  private $document;
  private $ipAddress;
  private $createdAt;
  
  public function __construct($name, $email, $phone, $message, $document, $ipAddress) {
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
    $this->message = $message;
    $this->document = $document;
    $this->ipAddress = $ipAddress;
    $this->table = 'candidates';
  }

  public function save() {
    if(!$id) {
      $values = [
        'name'=>$this->name,
        'email'=>$this->email,
        'phone'=>$this->phone,
        'message'=>$this->message,
        'document'=>$this->document,
        'ipAddress' => $this->ipAddress
      ];
      return $this->insert($values);
    }
   
  }

  public function find() {
    return $this->select()->fetchAll(PDO::FETCH_CLASS);
  }
}
