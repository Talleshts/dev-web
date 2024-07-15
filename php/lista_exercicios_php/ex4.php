<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Pés para Metros</title>
</head>
<body>
    <h1>Conversor de Pés para Metros</h1>
    <table border='1'>
        <tr>
            <th>Pés</th>
            <th>Metros</th>
        </tr>
        <?php
        $pesInicial = 3;
        $pesFinal = 30;
        $incremento = 3;
        $relacao = 3.25;

        for ($pes = $pesInicial; $pes <= $pesFinal; $pes += $incremento) {
            $metros = $pes / $relacao;
            echo "<tr>";
            echo "<td>" . number_format($pes, 2, ',', '.') . "</td>";
            echo "<td>" . number_format($metros, 2, ',', '.') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>