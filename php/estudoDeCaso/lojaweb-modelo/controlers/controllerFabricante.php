<?php
require_once '../dao/fabricanteDAO.inc.php';
require_once '../classes/produto.inc.php';

    session_start();
    $pOpcao = $_REQUEST['pOpcao'];
        
        switch ($pOpcao) {
            case 1:
               
            break;
            case 2:
                $fabricanteDao = new FabricanteDao();
                $lista = $fabricanteDao->getFabricantes();
                
                session_start();
                $_SESSION['fabricantes'] = $lista;
                header("Location:../views/formProduto.php");
            break;
            case 3:
                $fabricanteDao = new FabricanteDao();
                $lista = $fabricanteDao->getFabricantes();
                
                session_start();
                $_SESSION['fabricantes'] = $lista;
                header("Location:../views/formProdutoAtualizar.php");
            break;
        }

?>