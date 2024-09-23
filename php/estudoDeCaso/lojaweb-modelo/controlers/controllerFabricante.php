<?php
require_once '../dao/fabricanteDAO.inc.php';
require_once '../classes/produto.inc.php';

$pOpcao = $_REQUEST['pOpcao'];

switch ($pOpcao) {
    case 1:
        // Adicionar fabricante
        if (isset($_POST['nome'], $_POST['ramo'], $_POST['logradouro'], $_POST['cidade'], $_POST['cep'], $_POST['email'])) {
            $nome = $_POST['nome'];
            $ramo = $_POST['ramo'];
            $logradouro = $_POST['logradouro'];
            $cidade = $_POST['cidade'];
            $cep = $_POST['cep'];
            $email = $_POST['email'];

            $fabricanteDao = new FabricanteDAO();
            $fabricanteDao->addFabricante($nome, $ramo, $logradouro, $cidade, $cep, $email);
            header("Location:../views/sucesso.php");
        } else {
            header("Location:../views/erro.php?msg=Campos obrigatórios faltando");
        }
        break;
    case 2:
        // Listar fabricantes para adicionar produto
        $fabricanteDao = new FabricanteDao();
        $lista = $fabricanteDao->getFabricantes();

        session_start();
        $_SESSION['fabricantes'] = $lista;
        header("Location:../views/formProduto.php");
        break;
    case 3:
        // Listar fabricantes para atualizar produto
        $fabricanteDao = new FabricanteDao();
        $lista = $fabricanteDao->getFabricantes();

        session_start();
        $_SESSION['fabricantes'] = $lista;
        header("Location:../views/formProdutoAtualizar.php");
        break;
    case 4:
        // Atualizar fabricante
        session_start();

        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $ramo = $_POST['ramo'];
        $logradouro = $_POST['logradouro'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        $email = $_POST['email'];

        $fabricanteDao = new FabricanteDAO();
        $fabricanteDao->updateFabricante($codigo, $nome, $ramo, $logradouro, $cidade, $cep, $email);
        header("Location:../views/sucesso.php");
        break;
    case 5:
        // Deletar fabricante
        session_start();

        $codigo = $_REQUEST['codigo'];

        $fabricanteDao = new FabricanteDAO();
        $fabricanteDao->deleteFabricante($codigo);
        header("Location:../views/sucesso.php");
        break;
}
