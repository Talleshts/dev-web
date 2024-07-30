<?php
require_once 'conexao.inc.php';

class ClienteDAO{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function autenticate($email, $senha){
        $sql = $this->con->prepare("select * from clientes 
        where email = :email and senha = :senha");
        $email = strtolower($email);
        $senha = strtolower($senha);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        $cliente = null;

        if($sql->rowCount() == 1){
            $cliente = $sql->fetch(PDO::FETCH_ASSOC);
        }else if($sql->rowCount() > 1){
            echo("<h1> Erro de autenticação! Há mais de um cliente com os mesmos dados. </h1>");
        }else{
            echo("<h1> Erro de autenticação! Não há nenhum cliente registrado com essas credenciais. </h1>");
        }

        return $cliente;
    }

    function getAllClientes(){
        $clientes = $this->con->query("SELECT * FROM clientes");
        return $clientes->fetch(PDO::FETCH_OBJ);
    }
}

?>


