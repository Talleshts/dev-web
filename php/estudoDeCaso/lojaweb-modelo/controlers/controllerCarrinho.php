<?php
require_once '../dao/produtoDAO.inc.php';
require_once '../classes/produto.inc.php';

    session_start();
    $pOpcao = $_REQUEST['pOpcao'];
        
        switch ($pOpcao) {
            case 1:
                $id = (int)$_REQUEST['id'];

                $produtoDao = new ProdutoDAO();
                $produtoDao->getProdutoById($id);
                session_start();
                $carrinho = null;
                if (!isset($_SESSION['carrinho'])) {
                    $carrinho = array();
                }else{
                    $carrinho = $_SESSION['carrinho'];
                }

                $carrinho[] = $produto;
                $_SESSION["carrinho"] = $carrinho;
                header('Location: ../views/exibirCarrinho.php');
            break;
        }

?>