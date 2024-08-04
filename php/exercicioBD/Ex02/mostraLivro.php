<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVROS ENCONTRADO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            color: #666;
            margin-bottom: 10px;
        }

        p {
            color: #999;
            margin-bottom: 5px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .not-found {
            text-align: center;
            color: #666;
        }

        a{
            text-decoration: none;
            color: #333;
            margin-top: 40px;
            padding: 10px 20px;
            background-color: #fff;
            color: #333;
            border: 1px solid #333;
            border-radius: 3px;
            cursor: pointer;
        }

        a::hover{
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>LIVROS ENCONTRADOS</h1>
    <div class="container">
    <?php
        if (isset($_SESSION['livros'])) {
            foreach ((array)$_SESSION['livros'] as $livro) {
                echo "<h2>Título: " . $livro['titulo'] . "</h2>";
                echo "<p>ISBN: " . $livro['isbn'] . "</p>";
                echo "<p>Edição: " . $livro['edicao_num'] . "</p>";
                echo "<p>Ano de publicação: " . $livro['ano_publicacao'] . "</p>";
                echo "<p>Descrição: " . $livro['descricao'] . "</p>";
            }
        } else {
            echo "<h2 class='not-found'>Nenhum livro encontrado.</h2>";
        }
        
        ?>
    </div>
    <a href="../index.php">Voltar</a>
</body>
</html>