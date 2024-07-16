<?php
    $nome = $_REQUEST['vNome'];
    $senha = $_REQUEST['vSenha'];
    $login = $_REQUEST['vLogin'];

    if($login == 'labweb' && $senha == 'lab1234'){
        setcookie('titulo', "Laboratório Lab Web");
        setcookie('login',  $login);
        setcookie('nome',  $nome);

        header('Location: bemvindo2.php');
    }else{
        echo "Login incorreto! Voltar";
    }

?>