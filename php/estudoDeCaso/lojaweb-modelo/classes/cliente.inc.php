<?php

class Cliente
{
    private string $cpf;
    private string $nome;
    private string $logradouro;
    private string $cidade;
    private string $estado;
    private string $cep;
    private ?string $telefone;
    private string $data_nascimento;
    private string $email;
    private string $senha;
    private string $rg;
    private string $tipo;

    public function setCliente($cpf, $nome, $logradouro, $cidade, $estado, $cep, $telefone, $data_nascimento, $email, $senha, $rg, $tipo)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->logradouro = $logradouro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        $this->telefone = $telefone;
        $this->data_nascimento = strtotime($data_nascimento);
        $this->email = $email;
        $this->senha = $senha;
        $this->rg = $rg;
        $this->tipo = $tipo;
    }

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }


    public function setDataNascimento(string $data_nascimento): void
    {
        $this->data_nascimento = strtotime($data_nascimento);
    }
}
