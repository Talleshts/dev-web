<?php
require_once 'conexao.inc.php';

class ClienteDAO{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

   function incluirVenda($venda, $carrinho){

   }

   function incluirItens($idVenda, $carrinho){
    foreach( $carrinho as $item){

    }
   }

    function getIdVenda(){
        $sql = $this->con->query("SELECT MAX(id_venda) as maior from vendas");
        // $sql.execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }
}

?>


