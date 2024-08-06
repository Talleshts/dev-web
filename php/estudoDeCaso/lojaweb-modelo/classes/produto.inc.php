<?php

class Produto {
    private int $produto_id;
    private string $nome;
    private string $data_fabricacao;
    private float $preco;
    private int $estoque;
    private string $descricao;
    private string $resumo;
    private string $referencia;
    private int $cod_fabricante;

    public function setProduto($produto_id, $nome, $data_fabricacao, $preco, $estoque, $descricao, $resumo, $referencia, $cod_fabricante) {
        $this->produto_id = $produto_id;
        $this->nome = $nome;
        $this->data_fabricacao = strtotime($data_fabricacao);
        $this->preco = $preco;
        $this->estoque = $estoque;
        $this->estoque = $estoque;
        $this->descricao = $descricao;        
        $this->referencia = $referencia;        
        $this->cod_fabricante = $cod_fabricante;
    }


    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }


    public function setDataFabricacao(string $data_fabricacao): void {
        $this->data_fabricacao = strtotime($data_fabricacao);
    }

}

?>
