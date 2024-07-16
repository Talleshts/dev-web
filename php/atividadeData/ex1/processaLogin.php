<?php
    $nome = $_REQUEST['vNome'];
    $senha = $_REQUEST['vSenha'];
    $login = $_REQUEST['vLogin'];

    if($login == 'labweb' && $senha == 'lab1234'){
        session_start();
        $_SESSION['titulo'] = "Laboratório Lab Web";
        $_SESSION['login'] = $login;
        $_SESSION['nome'] = $nome;

        header('Location: bemvindo.php');
    }else{
        echo "Login incorreto! Voltar";
    }

?>