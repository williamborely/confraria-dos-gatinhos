<?php
    define("HOSTNAME", "http://localhost/acga-admin/");

 /*   
  * Constantes de parâmetros para configuração da conexão   
  */   
  define('HOST', 'localhost');   
  define('DBNAME', 'confraria_dos_gatinhos');   
  define('CHARSET', 'utf8');   
  define('USER', 'root');   
  define('PASSWORD', '');   
 
  try {
    $conn = new PDO('mysql:dbname='.DBNAME.';host='.HOST, USER, PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

  session_start();

?>