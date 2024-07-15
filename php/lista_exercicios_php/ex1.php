<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Avaliação</title>
</head>
<body>

<?php
$notas = array(
    "Prova" => 3,
    "Trabalho" => 8,
    "Atividades em sala" => 6
);
$nomeAluno = "Talles";

$totalNotas = count($notas);
if ($totalNotas > 0) {
    $media = number_format(array_sum($notas) / $totalNotas, 2, ',', '.');
} else {
    $media = 0; // média como 0 se não houver notas
}

$situacao = "";
if ($media <= 4.0) {
    $situacao = "Reprovado";
} elseif ($media < 7.0) {
    $situacao = "Em prova final";
} else {
    $situacao = "Aprovado";
}

echo "<h2>Resultado da Avaliação</h2>";
echo "<p><strong>Nome do Aluno:</strong> $nomeAluno</p>";
echo "<p><strong>Média:</strong> $media</p>";
echo "<p><strong>Situação:</strong> $situacao</p>";
?>

</body>
</html>