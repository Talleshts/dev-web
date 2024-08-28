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

    function getProdutos() {
        $sql = $this->con->query("
            SELECT p.*, f.nome AS nome_fabricante 
            FROM produtos p
            INNER JOIN fabricantes f ON p.cod_fabricante = f.codigo
        ");
        $produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $produtos;
    }


    function excluirProduto($id){
        $sql = $this->con->prepare("delete from produtos where produto_id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    function getProdutoById($id){
        // session_start();

        $sql = $this->con->prepare("
            SELECT p.*, f.nome AS nome_fabricante 
            FROM produtos p
            INNER JOIN fabricantes f ON p.cod_fabricante = f.codigo where produto_id = :id
        ");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() <= 0){
            exit;
        }else{
            $produto = $sql->fetch(PDO::FETCH_ASSOC);
            return $produto;
        }

    }

    function updateProduto(Produto $produto) {
        // Preparar a instrução SQL para atualizar o produto
        $sql = $this->con->prepare(
            "UPDATE produtos SET
                cod_fabricante = :cod_fabricante,
                data_fabricacao = :data_fabricacao,
                descricao = :descricao,
                estoque = :estoque,
                nome = :nome,
                preco = :preco,
                referencia = :referencia,
                resumo = :resumo
            WHERE produto_id = :produto_id"
        );
        
        // Vincular os valores aos parâmetros
        $sql->bindValue(":cod_fabricante", $produto->cod_fabricante, PDO::PARAM_INT);
        $sql->bindValue(':data_fabricacao', converteDataMysql($produto->data_fabricacao));
        $sql->bindValue(":descricao", $produto->descricao, PDO::PARAM_STR);
        $sql->bindValue(":estoque", $produto->estoque, PDO::PARAM_INT);
        $sql->bindValue(":nome", $produto->nome, PDO::PARAM_STR);
        $sql->bindValue(":preco", $produto->preco, PDO::PARAM_STR); // float values should be passed as strings
        $sql->bindValue(":referencia", $produto->referencia, PDO::PARAM_STR);
        $sql->bindValue(":resumo", $produto->resumo, PDO::PARAM_STR);
        $sql->bindValue(":produto_id", $produto->produto_id, PDO::PARAM_INT);
        
        // Executar a instrução SQL
        $sql->execute();
    }

    // private function getFabricante($id) {
    //     $sql = $this->con->prepare("SELECT nome FROM fabricantes WHERE codigo = :id");
    //     $sql->bindValue(':id', $id);
    //     $sql->execute();
        
    //     $fab = $sql->fetch(PDO::FETCH_ASSOC);
        
    //     return $fab['nome'];
    // }
    


}

?>