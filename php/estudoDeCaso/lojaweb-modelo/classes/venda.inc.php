<?php

class Venda{
    private float $id_venda;
    private $cpf;
    private $valorTotal;
    private $data;
    
    public function __construct( $cpf, $valor ) {
        $this->cpf = $cpf;
        $this->valorTotal = $valor;
        $data = time();
    }

    function __get($name)
    {
        return $this->$name;
    }
    
    function __set($name, $value)
    {
        $this->$name = $value;
    }
}
    
    
?>