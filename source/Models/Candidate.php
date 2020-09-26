<?php

namespace Source\Models;

class Candidate {
  private $name;
  private $email;
  private $phone;
  private $message;
  private $document;
  private $ipaddress;
  private $createdAt;

  public function __construct($name, $email, $phone, $message, $document, $ipaddress) {
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
    $this->message = $message;
    $this->document = $document;
  }

  public function save() {
    // salvar dados no bd;
  }
}