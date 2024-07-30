<?php

    $servidor = 'localhost';
    $nome_banco = 'livraria';
    $usuario = 'root';
    $senha = '';

    $con = new PDO("mysql:host=$servidor;dbname=$nome_banco", "$usuario", "$senha");

    // echo "Conexão Ok!";
    $opcao = $_REQUEST['opcao'];

    switch ($opcao) {
        case 1:
            //incluir
            $con->query("insert into autores (nome, email, dt_nasc) values ('Cleber bambam', 'bambam@gmail.com', '2001-11-20')");
            echo "Inserção concluida";
            break;
        case 2:
            # Alterar...
            $con->query("update autores set nome = 'Novo nome', email = 'email@emailnovo.com' where autor_id=48");
            echo "Mudança concluida";
            break;
        case 3:
            # Excluir...
            $con->query("delete from autores where autor_id=58");
            echo "Deleção concluida";
            break;
        case 4:
            # Seleionar...
            $autores = $con->query("select * from autores");
            echo "<ol>";
            while($autor = $autores->fetch(PDO::FETCH_OBJ)){
                echo "<li>$autor->nome - $autor->email</li>";
            }
            echo "</ol>";
            break;                     
        default:
            # Buscar por email...
            $email = $_REQUEST['buscar'];
            $sql = $con->prepare("select * from autores where email LIKE CONCAT('%', :email, '%')");
            $sql->bindValue(":email", $email);
            $sql->execute();

            if($sql->rowCount() <= 0){
                echo "Não existe um autor com esse email!";
            }else{
                echo "<ul>";
                echo "<h3> Autores encontrados! </h3>";
                while( $autor = $sql->fetch(PDO::FETCH_OBJ)){
                    echo "<li>$autor->nome - $autor->email</li>";
                    }
                }
                echo "</ul>";
            break;
    }





?>