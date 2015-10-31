<?php
  class Conexao {  
    
    private $con;
    static private $instancia;

    static public function getInstance() {
      if (self::$instancia)
        return self::$instancia;
      else {
        self::$instancia = new Conexao();
        return self::$instancia;
      }
    }

    public function getConexao() {
      return $this->con;
    }
    
    private function Conexao() {
      $this->con = mysql_connect("localhost", "root", "");
      mysql_select_db("systransportes", $this->con);
    }
  }
  
?>