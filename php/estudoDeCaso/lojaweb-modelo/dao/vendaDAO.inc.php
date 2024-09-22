<?php
require_once 'conexao.inc.php';
require_once '../classes/venda.inc.php';
require_once '../utils/funcoesUteis.php';
require_once '../classes/item.inc.php';

class VendaDAO
{
    private $con;

    function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function incluirVenda($venda, $carrinho)
    {
        $sql = $this->con->prepare("insert into vendas
        (cpf_cliente, dataVenda, valorTotal)
        values (:cpf, :data, :val)");
        $sql->bindValue(':cpf', $venda->cpf);
        $sql->bindValue(':data', converteDataMysql($venda->data));
        $sql->bindValue(':val', $venda->valorTotal);
        $sql->execute();

        $id = $this->getIdVenda();
        $this->incluirItens($id, $carrinho);
    }

    function incluirItens($idVenda, $carrinho)
    {
        foreach ($carrinho as $item) {
            $sql = $this->con->prepare("insert into itens 
        (id_produto, quantidade, valorTotal, id_venda) 
        values (:idPub, :q, :val, :idV)");

            $sql->bindValue(':idPub', $item->produto->produto_id);
            $sql->bindValue(':q', $item->quantidade);
            $sql->bindValue(':val', $item->valorItem);
            $sql->bindValue(':idV', $idVenda);
            $sql->execute();
        }
    }

    function getIdVenda()
    {
        $sql = $this->con->query("SELECT MAX(id_venda) as maior from vendas");
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);
        return $row->maior;
    }
}
