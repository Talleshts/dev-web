<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Preço Total</title>
</head>
<body>

<?php
$precos = array(
    "1001" => 5.32,
    "1324" => 6.45,
    "6548" => 2.37,
        // Colocar como string por causa do 0 esquerda
    "0987" => 5.32,
    "7623" => 6.45
);

$codigoProduto = "1324";
$quantidadeComprada = 3;
$precoUnitario = 0;

switch ($codigoProduto) {
    case "1001":
    case "1324":
    case "6548":
        // Colocar como string por causa do 0 esquerda
    case "0987":
    case "7623":
        $precoUnitario = $precos[$codigoProduto];
        break;
    default:
        echo "Código de produto inválido!";
        exit;
}

$precoTotal = $precoUnitario * $quantidadeComprada;

echo "<h2>Resumo da Compra</h2>";
echo "<p><strong>Código do Produto:</strong> $codigoProduto</p>";
echo "<p><strong>Quantidade Comprada:</strong> $quantidadeComprada</p>";
echo "<p><strong>Preço Unitário:</strong> R$ " . number_format($precoUnitario, 2, ',', '.') . "</p>";
echo "<p><strong>Preço Total:</strong> R$ " . number_format($precoTotal, 2, ',', '.') . "</p>";
?>

</body>
</html>
