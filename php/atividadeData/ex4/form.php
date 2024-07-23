<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dataValidade = $_POST['dataValidade'];

    if(!empty($dataValidade)){
        $dataValidade = new DateTime($dataValidade);
        $dataAtual = new DateTime();

        $intervalo = $dataAtual->diff($dataValidade);

        $dia = $intervalo->days;

        if($dia < 0){
            $dia *= -1;
            echo "<p> Total de dias passados da validade: $dia </p>";
        }else{
            echo "<p>" . $dataValidade->format("d/m/Y") . "<br>" . $dataAtual->format("d/m/Y") . "<br></p>";
            echo "<p> Total de dias ainda na validade: $dia </p>";
        }

        
    }

}



?>