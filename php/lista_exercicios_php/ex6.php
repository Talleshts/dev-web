<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Peso Normal para Crianças</title>
</head>
<body>

<h2>Calculadora de Peso Normal para Crianças</h2>

<?php

$idade = 7; 


if ($idade >= 6) {

    $pesoNormal = ((($idade - 6) / 4.4) + 2.3 * ($idade - 6) + 22);

    echo "<h3>Resultado:</h3>";
    echo "<p>Idade da Criança: $idade anos</p>";
    echo "<p>Peso Normal: " . number_format($pesoNormal, 2, ',', '.') . " kg</p>";
} else {
    echo "<p>Por favor, insira uma idade maior ou igual a 6 anos.</p>";
}
?>

</body>
</html>
