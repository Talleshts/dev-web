<?php
require_once 'conexao.inc.php';
require_once '../classes/produto.inc.php';
require_once '../utils/funcoesUteis.php';



class FabricanteDAO{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function getFabricantes(){
        $rs = $this->con->query("SELECT * FROM fabricantes");
        $lista = array();
        while($row = $rs->fetch(PDO::FETCH_OBJ)){
            $lista[] = $row;
        }
        
        return $lista;
    }
}

?>