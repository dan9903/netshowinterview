<?php


namespace Source\Database\Entity;

class CandidateEntity
{
  
  protected $db;

  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  public function save($candidate) : bool
  {

  }

  public function __destruct()
  {
    $this->db->close();
  }

}
