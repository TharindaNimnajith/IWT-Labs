<?php
	ini_set('display_errors',1);
	error_reporting(-1);
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'mystore');


   $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
  if ($link->connect_error) {
    die("Cannot access db.");
  }
  
?>