<?php

namespace App\repository;

use PDO;
use Exception;

class Database{

  private $db_name = "mrp";
  private $db_host = "localhost"; 
  private $db_user = "root";
  private $db_pass = "";

  public function Connect(){
    $dsn = "mysql:host={$this->db_host};dbname={$this->db_name}";
    try{
      $conn = new PDO($dsn, $this->db_user, $this->db_pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    }
    catch (Exception $e){
      die("Erro ao conectar com o banco de dados: " . $e->getMessage());
    }
  }
}
?>