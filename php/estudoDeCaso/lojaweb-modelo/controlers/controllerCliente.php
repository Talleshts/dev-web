<?php
require_once '../dao/clienteDAO.inc.php';

    $opcao = $_REQUEST['pOpcao'];
        
        switch ($opcao) {
            case 1:
                $clienteDAO = new ClienteDAO();
                $email = $_REQUEST['pEmail'];
                $senha = $_REQUEST['pSenha'];

                $cliente = $clienteDAO->autenticate($email, $senha);
                if($cliente != null){
                    session_start();
                    $_SESSION['clienteLogado'] = $cliente;
                    header('Location: ../views/exibirProdutos.php');
                }else{
                    header('Location: ../views/formLogin.php?erro=1');
                }
            break;
        }

?>