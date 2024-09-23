<?php
require_once 'conexao.inc.php';
require_once '../classes/produto.inc.php';
require_once '../utils/funcoesUteis.php';

class FabricanteDAO
{
    private $con;

    function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function getFabricantes()
    {
        $rs = $this->con->query("SELECT * FROM fabricantes");
        $lista = array();
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function addFabricante($nome, $ramo, $logradouro, $cidade, $cep, $email)
    {
        $stmt = $this->con->prepare("INSERT INTO fabricantes (nome, ramo, logradouro, cidade, cep, email) VALUES (:nome, :ramo, :logradouro, :cidade, :cep, :email)");
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":ramo", $ramo);
        $stmt->bindValue(":logradouro", $logradouro);
        $stmt->bindValue(":cidade", $cidade);
        $stmt->bindValue(":cep", $cep);
        $stmt->bindValue(":email", $email);
        return $stmt->execute();
    }

    public function updateFabricante($codigo, $nome, $ramo, $logradouro, $cidade, $cep, $email)
    {
        $stmt = $this->con->prepare("UPDATE fabricantes SET nome = :nome, ramo = :ramo, logradouro = :logradouro, cidade = :cidade, cep = :cep, email = :email WHERE codigo = :codigo");
        $stmt->bindValue(":codigo", $codigo);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":ramo", $ramo);
        $stmt->bindValue(":logradouro", $logradouro);
        $stmt->bindValue(":cidade", $cidade);
        $stmt->bindValue(":cep", $cep);
        $stmt->bindValue(":email", $email);
        return $stmt->execute();
    }


    public function deleteFabricante($codigo)
    {
        $stmt = $this->con->prepare("DELETE FROM fabricantes WHERE codigo = :codigo");
        $stmt->bindValue(":codigo", $codigo);
        $stmt->execute();
    }
}
