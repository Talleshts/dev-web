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
                uploadFotos($_REQUEST['pReferencia']);
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
                deletarFoto($produtoDao->getProdutoById($id)->referencia);
                $produtoDao->excluirProduto($id);
                header('Location:controllerProduto.php?pOpcao=2');
            break;
            case 4:
                $id = $_REQUEST['pId'];
                $produtoDao = new ProdutoDAO();
                $produto = $produtoDao->getProdutoById($id);
                session_start();
                $_SESSION['produto'] = $produto;
                header('Location:controllerFabricante.php?pOpcao=3');
            break;
        }


        function uploadFotos($ref){
            $imagem = $_FILES["imagem"];
            $nome = $ref; // será colocado a Referência do produto como nome do arquivo
            
            if($imagem != NULL) {
                $nome_temporario=$_FILES["imagem"]["tmp_name"];
                copy($nome_temporario,"../views/imagens/produtos/$nome.jpg");
            }
            else {
                echo "Você não realizou o upload de forma satisfatória.";
            }
        }

        function deletarFoto($ref){

            $arquivo = "../views/imagens/produtos/$ref.jpg";
            
            if(file_exists( $arquivo )){ // verifica se o arquivo existe
                if (!unlink($arquivo)){ //aqui que se remove o arquivo retornando true, senão mostra mensagem
                    echo "Não foi possível deletar o arquivo!";
                }
            }
        }

?>