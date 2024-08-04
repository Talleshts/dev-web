<?php

class Conexao{

    private $servidor = 'localhost';
    private $nome_banco = 'livraria';
    private $usuario = 'root';
    private $senha = '';

    public function getConexao()
    {
          $this->con = new PDO("mysql:host=$this->servidor_mysql;dbname=$this->nome_banco","$this->usuario","$this->senha");
          return $this->con;
    }
    
}

?>