<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste com BD e PHP</title>
</head>
<body>
    <div align="center">
        <a href="conexao.php?opcao=1">Incluir</a>
        <a href="conexao.php?opcao=2">Selecionar</a>
        <a href="conexao.php?opcao=3">Excluir</a>
        <a href="conexao.php?opcao=4">Selecionar Um</a>
        <hr width="50%">
        <form action="conexao.php">
            <label for="buscar">Buscar autor(email): </label>
            <input type="text" name="buscar" size="40">
            <input type="hidden" name="opcao" value="5">
            <p><input type="submit" value="Buscar"></p>
        </form>
    </div>
</body>
</html>