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

        div{
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
    </style>
</head>
<body>
    <h1>Busca de livro no banco</h1>
    <h3>Insira o código ISBN exato para realizar a busca </h3>
    <div>
        <form action="./../Controller/livrariaController.php">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" size="40">
            <br>
            <input type="hidden" name="opcao" value="3">
            <input type="submit" value="Buscar">
            <a href="../index.php">Voltar</a>
        </form>
    </div>
</body>
</html>

