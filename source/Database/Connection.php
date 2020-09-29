<?php

namespace Source\Database;

use \PDO;
use \PDOException;

class Connection {

  private static $instance;

  /**
   * @return PDO 
   */

  public static function getInstance() : PDO
  {
    if(empty(self::$instance)){
      try {
        //todos get all configuration
        self::$instance = new PDO(
          DATABASE.":host=".HOST.";dbname=".DBNAME.";port=".PORT,
          USER,
          PASSWORD,
          OPTIONS
          );
      } catch (PDOException $e) {
        die("Oops! Erro ao conectar com o banco de dados.");
      }
    }
    return self::$instance;
  }
  
}
