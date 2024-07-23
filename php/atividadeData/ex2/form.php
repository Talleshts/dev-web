<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dataNascimento = $_POST['dataNascimento'];

    if(!empty($dataNascimento)){
        $dataNascimento = new DateTime($dataNascimento);
        $dataAtual = new DateTime();

        $intervalo = $dataAtual->diff($dataNascimento);

        $dia = $intervalo->days;
        $mes = intval($dia/365);

        echo "<p> Total de dias: $dia <br>Total de meses: $mes </p>";
        
    }

}



?>