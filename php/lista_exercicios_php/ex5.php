<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Conversão de Fahrenheit para Celsius</title>
</head>
<body>
    <h1>Tabela de Conversão de Fahrenheit para Celsius</h1>

    <table border="1">
        <tr>
            <th>Fahrenheit</th>
            <th>Celsius</th>
        </tr>

        <?php
        for ($fahrenheit = 0; ; $fahrenheit += 2) {
            $celsius = ($fahrenheit - 30) / 2;
            
            if ($celsius > 60) {
                break;
            }
            
            echo "<tr>";
            echo "<td>$fahrenheit</td>";
            echo "<td>$celsius</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>