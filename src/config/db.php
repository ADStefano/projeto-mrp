<?php

$db_name = 'mrp';
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = '';
$dsn = "mysql:host=$db_host;dbname=$db_name";

try {

  $conn = new PDO($dsn, $db_user, $db_pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // echo "Conectado com o banco de dados";

} catch(PDOException $e) {
    // FIXME AJUSTAR ISSO PRA NÃO MOSTRAR O ERRO
  echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
  die;
}

?>