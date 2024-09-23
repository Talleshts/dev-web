<?php
require_once '../dao/produtoDAO.inc.php';
require_once '../classes/item.inc.php';

if (isset($_REQUEST['pOpcao'])) {
    $pOpcao = (int)$_REQUEST['pOpcao'];
    switch ($pOpcao) {
        case 1: // Adicionar item ao carrinho
            $id = (int)$_REQUEST['id'];
            $produtoDao = new ProdutoDAO();
            $produto = $produtoDao->getProdutoById($id);
            $item = new Item($produto);
            session_start();

            if (!isset($_SESSION['carrinho'])) {
                $carrinho = array();
            } else {
                $carrinho = $_SESSION['carrinho'];
            }

            $key = array_search2($item->produto->produto_id, $carrinho);
            if ($key != -1) {
                $carrinho[$key]->setQuantidade();
                $carrinho[$key]->setValorItem();
            } else {
                $carrinho[] = $item;
            }

            $_SESSION['carrinho'] = $carrinho;
            header('Location: ../views/exibirCarrinho.php');
            break;
            //excluir todos
        case 2:
            session_start();
            $_SESSION['carrinho'] = array();
            header('Location: ../views/exibirCarrinho.php');
            exit();
            break;
            //escluir um
        case 3:
            session_start();
            $index = (int)$_REQUEST['index'];
            $carrinho = $_SESSION['carrinho'];

            unset($carrinho[$index]);
            sort($carrinho);

            $_SESSION['carrinho'] = $carrinho;
            header('Location: controllerCarrinho.php?pOpcao=4');
            break;
        case 4: // Atualizar quantidade de um item no carrinho via POST
            session_start();
            $index = (int)$_POST['index'];
            $novaQuantidade = (int)$_POST['quantidade'];

            // Valida quantidade maior que 0
            if ($novaQuantidade > 0 && isset($_SESSION['carrinho'][$index])) {
                $_SESSION['carrinho'][$index]->quantidade = $novaQuantidade;
                $_SESSION['carrinho'][$index]->valorItem = $_SESSION['carrinho'][$index]->produto->preco * $novaQuantidade;
            }

            header("Location: ../views/exibirCarrinho.php");
            break;
        case 5:
            session_start();
            if (isset($_SESSION['clienteLogado'])) {
                $_SESSION["valorTotal"] = $_REQUEST["total"];
                header('Location: ../views/dadosCompra.php');
            } else {
                header('Location: ../views/formLogin.php?erro=1');
            }
            break;
    }
}

function array_search2($chave, $vetor)
{
    $index = -1;
    for ($i = 0; $i < count($vetor); $i++) {
        if ($chave == $vetor[$i]->produto->produto_id) {
            $index = $i;
            break;
        }
    }
    return $index;
}
