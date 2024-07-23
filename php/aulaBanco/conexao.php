<?php

    $servidor = 'localhost';
    $nome_banco = 'livraria';
    $usuario = 'root';
    $senha = '';

    $con = new PDO("mysql:host=$servidor;dbname=$nome_banco", "$usuario", "$senha");

    echo "Conexão Ok!";

    $opcao = $_REQUEST['opcao'];

    if($opcao == 1){//incluir

    }else if($opcao == 2){//alterar

    }else if($opcao == 3){//excluir
        
    }else if($opcao == 4){//selecionar
        
    }else{//busca por email
        
    }




?>