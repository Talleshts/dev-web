<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Depreciação</title>
</head>
<body>

<?php
$valorInicial = 28000;
$depreciacaoAnual = 4000;
$anos = 7;

echo "<h2>Tabela de Depreciação</h2>";
echo "<table border='1'>";
echo "<tr>
        <th>Ano</th>
        <th>Depreciação</th>
        <th>Valor no Final do Ano</th>
        <th>Valor no Início do Ano</th>
        <th>Depreciação Acumulada</th>
    </tr>";

for ($ano = 1; $ano <= $anos; $ano++) {
    $valorInicioAno = $valorInicial - ($depreciacaoAnual * ($ano - 1));
    $valorFimAno = $valorInicioAno - $depreciacaoAnual;
    $depreciacaoAcumulada = $depreciacaoAnual * $ano;

    echo "<tr>";
    echo "<td>$ano</td>";
    echo "<td>R$ " . number_format($depreciacaoAnual, 2, ',', '.') . "</td>";
    echo "<td>R$ " . number_format($valorFimAno, 2, ',', '.') . "</td>";
    echo "<td>R$ " . number_format($valorInicioAno, 2, ',', '.') . "</td>";
    echo "<td>R$ " . number_format($depreciacaoAcumulada, 2, ',', '.') . "</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>
