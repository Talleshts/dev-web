<?php
require_once 'conexao.inc.php';
require_once '../classes/produto.inc.php';


class ProdutoDAO{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function insert(Produto $produto){
        $sql = $this->con->prepare("insert into produtos
        ( produto_id, nome, data_fabricacao, preco, estoque, descricao, resumo, referencia, cod_fabricante)
        values (:produto_id, :nome, :data_fabricacao, :preco, :estoque, :descricao, :resumo, :referencia, :cod_fabricante)");

        $sql->bindValue(":produto_id", $produto->produto_id);
        $sql->bindValue(":nome", $produto->nome);
        $sql->bindValue(":data_fabricacao", $produto->data_fabricacao);
        $sql->bindValue(":preco", $produto->preco);
        $sql->bindValue(":estoque", $produto->estoque);
        $sql->bindValue(":descricao", $produto->descricao);
        $sql->bindValue(":resumo", $produto->resumo);
        $sql->bindValue(":referencia", $produto->referencia);
        $sql->bindValue(":cod_fabricante", $produto->cod_fabricante);

        $sql->execute();

        exit;
    }

}

?>