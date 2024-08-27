<?php

class Item{
    private float $valorItem;
    private $quantidade;
    public $produto;
    
    public function __construct( $produto, $quantidade) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->setValorItem();
    }

    function __get($name)
    {
        return $this->$name;
    }
    
    function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function setValorItem(){
        $this->valorItem = $this->quantidade * $this->produto->preco;
    }

    public function setQuantidade(){
        $this->quantidade++;
    }
}
    
    
    
    
    ?>