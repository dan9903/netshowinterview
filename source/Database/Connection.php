<?php

namespace Source\Database;

use Database;

class Connection
{
  private static $instance;

  /**
   * @return PDO 
   */

  public static function getInstance() : PDO
  { 
    if(empty(self::$instance)){
      try {
        //todp get all configuration
        self::$instance = new PDO(
          DATABASE.":host=".HOST.";dbname=".DAT.";port=3306",
          "root",
          "defcon1",
          [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
          ]
        );
      } catch (PDOException $e) {
        die("Oops! Erro ao conectar com o banco de dados.");
      }
    }
    return self::$instance;
  }

  final private function __construct() {}

  final private function __clone() {}

}
