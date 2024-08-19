<?php
require_once 'conexao.inc.php';
require_once '../classes/produto.inc.php';
require_once '../utils/funcoesUteis.php';



class ProdutoDAO{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function insert(Produto $produto){
        $sql = $this->con->prepare("insert into produtos
        ( nome, data_fabricacao, preco, estoque, descricao, resumo, referencia, cod_fabricante)
        values ( :nome, :data_fabricacao, :preco, :estoque, :descricao, :resumo, :referencia, :cod_fabricante)");

        $sql->bindValue(":nome", $produto->nome);
        $sql->bindValue(':data_fabricacao', converteDataMysql($produto->data_fabricacao));
        $sql->bindValue(":preco", $produto->preco);
        $sql->bindValue(":estoque", $produto->estoque);
        $sql->bindValue(":descricao", $produto->descricao);
        $sql->bindValue(":resumo", $produto->resumo);
        $sql->bindValue(":referencia", $produto->referencia);
        $sql->bindValue(":cod_fabricante", $produto->cod_fabricante);

        $sql->execute();

        exit;
    }

    function getProdutos(){
        $sql = $this->con->query("select * from produtos");
        $produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $produtos;
    }

    function excluirProduto($id){
        $sql = $this->con->prepare("delete from produtos where produto_id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}

?>