<?php
require_once 'conexao.inc.php';

class ClienteDAO
{
    private $con;

    function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function autenticate($email, $senha)
    {
        $sql = $this->con->prepare("SELECT * FROM clientes WHERE email = :email AND senha = :senha");
        $email = strtolower($email);
        $senha = strtolower($senha);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        $cliente = null;

        if ($sql->rowCount() == 1) {
            $cliente = $sql->fetch(PDO::FETCH_ASSOC);
        } else if ($sql->rowCount() > 1) {
            echo ("<h1> Erro de autenticação! Há mais de um cliente com os mesmos dados. </h1>");
        } else {
            echo ("<h1> Erro de autenticação! Não há nenhum cliente registrado com essas credenciais. </h1>");
        }

        return $cliente;
    }

    function getAllClientes()
    {
        $clientes = $this->con->query("SELECT * FROM clientes");
        return $clientes->fetch(PDO::FETCH_OBJ);
    }

    function inserirCliente($cpf, $nome, $logradouro, $cidade, $estado, $cep, $telefone, $data_nascimento, $email, $senha, $rg, $tipo)
    {
        $sql = $this->con->prepare("INSERT INTO clientes (cpf, nome, logradouro, cidade, estado, cep, telefone, data_nascimento, email, senha, rg, tipo) VALUES (:cpf, :nome, :logradouro, :cidade, :estado, :cep, :telefone, :data_nascimento, :email, :senha, :rg, :tipo)");
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":logradouro", $logradouro);
        $sql->bindValue(":cidade", $cidade);
        $sql->bindValue(":estado", $estado);
        $sql->bindValue(":cep", $cep);
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":data_nascimento", $data_nascimento);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":rg", $rg);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();

        $this->inserirOuAtualizarUsuarios($cpf, $email, $senha, $tipo);
    }

    function buscarClientePorCpf($cpf)
    {
        $sql = $this->con->prepare("SELECT * FROM clientes WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    function atualizarCliente($cpf, $nome, $logradouro, $cidade, $estado, $cep, $telefone, $data_nascimento, $email, $senha, $rg, $tipo)
    {
        $sql = $this->con->prepare("UPDATE clientes SET nome = :nome, logradouro = :logradouro, cidade = :cidade, estado = :estado, cep = :cep, telefone = :telefone, data_nascimento = :data_nascimento, email = :email, senha = :senha, rg = :rg, tipo = :tipo WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":logradouro", $logradouro);
        $sql->bindValue(":cidade", $cidade);
        $sql->bindValue(":estado", $estado);
        $sql->bindValue(":cep", $cep);
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":data_nascimento", $data_nascimento);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":rg", $rg);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();

        $this->inserirOuAtualizarUsuarios($cpf, $email, $senha, $tipo);
    }

    function buscarClientePorEmail($email)
    {
        $sql = $this->con->prepare("SELECT * FROM clientes WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    function atualizarTipoCliente($cpf, $tipo)
    {
        $sql = $this->con->prepare("UPDATE clientes SET tipo = :tipo WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();

        $this->inserirOuAtualizarUsuarios($cpf, null, null, $tipo);
    }
    private function inserirOuAtualizarUsuarios($cpf, $email, $senha, $tipo)
    {
        $tipo = $this->mapearTipo($tipo);

        if ($this->usuarioExiste($cpf)) {
            $this->atualizarUsuario($cpf, $email, $senha, $tipo);
        } else {
            $this->inserirUsuario($cpf, $email, $senha, $tipo);
        }
    }

    private function mapearTipo($tipo)
    {
        $tipoMap = [
            'C' => 1,
            'A' => 2,
            'D' => 3
        ];
        if (!isset($tipoMap[$tipo])) {
            throw new InvalidArgumentException("Tipo inválido: $tipo");
        } else {
            return $tipoMap[$tipo];
        }
    }

    private function usuarioExiste($cpf)
    {
        $sql = $this->con->prepare("SELECT * FROM usuarios WHERE id = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();

        return $sql->rowCount() > 0;
    }

    private function atualizarUsuario($cpf, $email, $senha, $tipo)
    {
        $sql = $this->con->prepare("UPDATE usuarios SET login = :email, senha = :senha, tipo = :tipo WHERE id = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();
    }

    private function inserirUsuario($cpf, $email, $senha, $tipo)
    {
        $sql = $this->con->prepare("INSERT INTO usuarios (id, login, senha, tipo) VALUES (:cpf, :email, :senha, :tipo)");
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();
    }
}
