<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dataEscolhida = $_POST['dataEscolhida'];

    if(!empty($dataEscolhida)){
        $dataEscolhida = new DateTime($dataEscolhida);
        $proximaQuarta = $dataEscolhida->modify('next wednesday')->format("d/m/Y");
        $ultimoDiaDoMes = $dataEscolhida->modify('last day of this month')->format("d/m/Y");
        $dataEscolhida = $dataEscolhida->format("d/m/Y");

        echo "<p> Data escolhida: $dataEscolhida <br> Proxima quarta-feira: $proximaQuarta <br> Ultimo dia do Mês escolhido: $ultimoDiaDoMes </p>";
        // echo $dataEscolhida;
        // echo $proximaQuarta;
        // echo $ultimoDiaDoMes;
        
    }

}



?>