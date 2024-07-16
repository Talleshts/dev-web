<?php
    session_start();
    $date = new DateTime();

    // data
    $dia = $date->format('d');
    $mes = $date->format('m');
    $ano = $date->format('Y');
    
    // hora
    $hora = $date->format('h');
    $minuto = $date->format('m');

?>

<!DOCTYPE html>
<html>
<head>
    <title>PÁGINA INICIAL DEPOIS DO LOGIN</title>
</head>
<body>
    <?php 
        echo "<h1> Bem vindo " . $_SESSION['nome'] . "</h1>";
        echo "<h1> Hoje são " . $dia . " de " . $mes ." de ". $ano . " </h1>";
        echo "<h1> Seu acesso no sistema foi feito às " . $hora . ":" . $minuto . " </h1>";
    ?>

    <b>Título: <?= $_SESSION['titulo']?> </b>
    <br>
    <b>Seu login foi:  <?= $_SESSION['login']?> </b>

</body>
</html>