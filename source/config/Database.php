<?php 
define("DATABASE", "");
define("HOST", "");
define("DBNAME", "");
define("PORT", "");
define("USER", "");
define("PASSWORD", "");
define("OPTIONS", [
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
  PDO::ATTR_CASE => PDO::CASE_NATURAL
]);
