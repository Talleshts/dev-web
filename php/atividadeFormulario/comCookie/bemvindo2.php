<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>PÁGINA INICIAL DEPOIS DO LOGIN</title>
</head>
<body>
    <?php 
        echo "<h1> Bem vindo " . $_COOKIE['nome'] . "</h1>";
    ?>

    <b>Título: <?= $_COOKIE['titulo']?> </b>
    <br>
    <b>Seu login foi:  <?= $_COOKIE['login']?> </b>

</body>
</html>