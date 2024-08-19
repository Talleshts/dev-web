<?php
require_once '../dao/produtoDAO.inc.php';
require_once '../classes/produto.inc.php';

    session_start();
    $pOpcao = $_REQUEST['pOpcao'];
        
        switch ($pOpcao) {
            case 1:
                $produto = new Produto();
                $produto->setProduto(
                    $_REQUEST['pNome'], 
                    $_REQUEST['pDataFabricacao'], 
                    $_REQUEST['pPreco'], 
                    $_REQUEST['pEstoque'], 
                    $_REQUEST['pDescricao'], 
                    $_REQUEST['pResumo'], 
                    $_REQUEST['pReferencia'],
                    $_REQUEST['pFabricante']
                );
                $produtoDao = new ProdutoDAO();
                $produtoDao->insert($produto);
                header('Location:controllerProduto.php?pOpcao=2');
            break;
            case 2:
                session_start();
                $produtoDao = new ProdutoDAO();
                $produtos = $produtoDao->getProdutos();
                $_SESSION['produtos'] = $produtos;
                header('Location:../views/exibirProdutos.php');
            break;
            case 3:
                $id = $_REQUEST['pId'];
                $produtoDao = new ProdutoDAO();
                $produtoDao->excluirProduto($id);
                header('Location:controllerProduto.php?pOpcao=2');
            break;
        }

?>