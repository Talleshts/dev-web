<?php
require_once '../dao/produtoDAO.inc.php';
require_once '../classes/item.inc.php';

    $pOpcao = $_REQUEST['pOpcao'];
        
        switch ($pOpcao) {
            case 1:
                $id = (int)$_REQUEST['id'];
                $produtoDao = new ProdutoDAO();
                $produto = $produtoDao->getProdutoById($id);
                $item = new Item($produto, 1);
                session_start();
                $carrinho = null;
                if (!isset($_SESSION['carrinho'])) {
                    $carrinho = array();
                }else{
                    $carrinho = $_SESSION['carrinho'];
                }

                $carrinho[] = $item;
                $_SESSION['carrinho'] = $carrinho;
                header('Location: ../views/exibirCarrinho.php');
            break;
            case 2:
                session_start();
                $_SESSION['carrinho'] = array();
                header('Location: ../views/exibirCarrinho.php');
                exit();
            break;
        }

?>