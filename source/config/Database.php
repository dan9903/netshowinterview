<?php 
define("DATABASE", "mysql");
define("HOST", "localhost");
define("DBNAME", "netshowinterview");
define("PORT", "3306");
define("USER", "root");
define("PASSWORD", "defcon1");
define("OPTIONS", [
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
  PDO::ATTR_CASE => PDO::CASE_NATURAL
]);