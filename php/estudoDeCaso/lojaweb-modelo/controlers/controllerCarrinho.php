<?php
require_once '../dao/produtoDAO.inc.php';
require_once '../classes/item.inc.php';

    $pOpcao = $_REQUEST['pOpcao'];
        
        switch ($pOpcao) {
            case 1:
                $id = (int)$_REQUEST['id'];
                $produtoDao = new ProdutoDAO();
                $produto = $produtoDao->getProdutoById($id);
                $item = new Item($produto);
                session_start();

                if (!isset($_SESSION['carrinho'])) {
                    $carrinho = array();
                }else{
                    $carrinho = $_SESSION['carrinho'];
                }

                $key = array_search2($item->produto['produto_id'], $carrinho);
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
                $index = (int)$_REQUEST['index'];
                session_start();
                $carrinho = $_SESSION['carrinho'];

                unset($carrinho[$index]);
                sort($carrinho);

                $_SESSION['carrinho'] = $carrinho;
                header('Location: controllerCarrinho.php?pOpcao=4');
                break;
            case 4:
                session_start();

                if(!isset($_SESSION['carrinho']) || sizeof($_SESSION['carrinho'])==0){
                    header('Location: ../views/exibirCarrinho.php?status=1');
                }else{
                    header('Location: ../views/exibirCarrinho.php');
                }
                break;
            case 5:
                session_start();
                if(isset($_SESSION['clienteLogado'])){
                    $_SESSION["valorTotal"] = $_REQUEST["total"];
                    header('Location: ../views/dadosCompra.php');
                }else{
                    header('Location: ../views/formLogin.php?erro=1');
                }
        }


        function array_search2($chave, $vetor){
            $index = -1;
            for($i = 0; $i<count($vetor);$i++){
                if($chave == $vetor[$i]->produto['produto_id']){
                    $index = $i;
                    break;
                }
            }
            return $index;
        }


?>