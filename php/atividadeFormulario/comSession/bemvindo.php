<?php
    session_start()
?>

<!DOCTYPE html>
<html>
<head>
    <title>PÁGINA INICIAL DEPOIS DO LOGIN</title>
</head>
<body>
    <?php 
        echo "<h1> Bem vindo " . $_SESSION['nome'] . "</h1>";
    ?>

    <b>Título: <?= $_SESSION['titulo']?> </b>
    <br>
    <b>Seu login foi:  <?= $_SESSION['login']?> </b>

</body>
</html>