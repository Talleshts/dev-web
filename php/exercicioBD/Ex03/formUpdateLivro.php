<?php
    session_start();
    $livro = $_SESSION['livro'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do livro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        div.formulario {
            border: 1px solid #ccc;
            width: 500px;
            
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        label::after {
            content: ":";
            margin-left: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
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

        .no-margin-bottom {
            margin-bottom: 0;
        }


    </style>
</head>
<body>
    <h1>Edite o livro no banco</h1>
    <h3>Insira os dados pedidos sobre seu livro para edita-lo no banco</h3>
    <div class="formulario">
        <form action="./../Controller/livrariaController.php">

            <label for="isbn">ISBN Atual:</label>
            <input type="text" id="isbn" name="isbn" value="<?php echo $_SESSION['livro']['isbn']; ?>" readonly><br>
            <br>
            <label for="">Deseja mudar o ISBN?</label>
            <input type="checkbox" onclick="toggleIsbnInput()"></input>
            <br>
            <div id="isbnInput" style="display: none;">
                <label class="no-margin-bottom" for="novo_isbn">Novo ISBN</label>
                <input type="text" id="novo_isbn" name="novo_isbn">
            </div>
            <br>
            <label for="titulo">Título</label>
            <input type="text" name="titulo" value="<?php echo isset($livro['titulo']) ? $livro['titulo'] : ''; ?>" size="40">
            <br>
            <label for="edicao_num">Numero da Edição</label>
            <input type="number" name="edicao_num"  value="<?php echo isset($livro['edicao_num']) ? $livro['edicao_num'] : ''; ?>" size="40">
            <br>
            <label for="ano_publicacao">Ano que foi publicado</label>
            <input type="number" name="ano_publicacao" value="<?php echo isset($livro['ano_publicacao']) ? $livro['ano_publicacao'] : ''; ?>" size="40">
            <br>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" value="<?php echo isset($livro['descricao']) ? $livro['descricao'] : ''; ?>" size="40">
            <br>
            <input type="hidden" name="opcao" value="4">
            <input type="submit" value="Atualizar Livro">
            <a href="./formFindByISBN.php">Voltar</a>
        </form>
    </div>
</body>
</html>

<script>
    function mudarIsbn(){
        var isbn = document.getElementById('isbn');
        var novo_isbn = document.getElementById('novo_isbn');
        if(novo_isbn.readOnly){
            novo_isbn.readOnly = false;
            novo_isbn.value = '';
        }else{
            novo_isbn.readOnly = true;
            novo_isbn.value = isbn.value;
        }
    }

    function toggleIsbnInput() {
            var isbnInput = document.getElementById('isbnInput');
            
            if (isbnInput.style.display === 'none') {
                isbnInput.style.display = 'flex';
                isbnInput.style.justifyContent = 'center';
                isbnInput.style.alignItems = 'center';
            } else {
                isbnInput.style.display = 'none';
            }
        }

</script>
