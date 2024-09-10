<?php
require_once '../dao/conexao.inc.php';
require_once '../classes/venda.inc.php';
require_once '../dao/vendaDAO.inc.php';

    $opcao = $_REQUEST['pOpcao'];

    switch ($opcao){
        case 1:
            session_start();
            $carrinho = $_SESSION['carrinho'];
            $cliente = $_SESSION['clienteLogado'];
            $total = $_SESSION['valorTotal'];

            $venda = new Venda($cliente['cpf'], $total);
            $dao = new VendaDAO();
            $dao->incluirVenda($venda, $carrinho);

            unset($_SESSION['carrinho']);

            $tipo = $_REQUEST['pag'];
            if($tipo == 'boleto'){
                header("Location:../views/boleto/meuBoleto.php");
                // echo "Boleto emitido!";
            }else{
                echo "Validar compra com cartão";
            }



            break;
    }



?>