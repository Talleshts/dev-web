<?php
require_once '../dao/clienteDAO.inc.php';

$opcao = $_REQUEST['pOpcao'];

switch ($opcao) {
    case 1:
        //Autenticar
        $clienteDAO = new ClienteDAO();
        $email = $_REQUEST['pEmail'];
        $senha = $_REQUEST['pSenha'];

        $cliente = $clienteDAO->autenticate($email, $senha);
        if ($cliente != null) {
            if ($cliente['tipo'] == 'D') {
                session_start();
                $_SESSION['pEmail'] = $email;
                header('Location: ../views/formLogin.php?erro=2');
            } else {
                session_start();
                $_SESSION['clienteLogado'] = $cliente;
                header('Location: controllerProduto.php?pOpcao=6');
            }
        } else {
            header('Location: ../views/formLogin.php?erro=1');
        }
        break;
    case 2:
        //Deslogar
        session_start();
        if (isset($_SESSION['clienteLogado'])) {
            $cliente = $_SESSION['clienteLogado'];
            if ($cliente['tipo'] == 'D') {
                unset($_SESSION['clienteLogado']);
                header("Location:../views/index.php?erro=1");
            }
        }
        unset($_SESSION['clienteLogado']);
        header("Location:../views/index.php");
        break;
    case 3:
        //Cadastrar cliente
        $cpf = $_REQUEST['pCpf'];
        $email = $_REQUEST['pEmail'];
        $senha = $_REQUEST['pSenha'];

        if (empty($cpf) || empty($email) || empty($senha)) {
            header("Location: ../views/formCliente.php?erro=1");
            exit();
        }

        $clienteDAO = new ClienteDAO();
        $clienteExistente = $clienteDAO->buscarClientePorCpf($cpf);

        if ($clienteExistente) {
            header("Location: controllerCliente.php?pOpcao=5&pCpf=$cpf&pNome={$_REQUEST['pNome']}&pLogradouro={$_REQUEST['pLogradouro']}&pCidade={$_REQUEST['pCidade']}&pEstado={$_REQUEST['pEstado']}&pCep={$_REQUEST['pCep']}&pTelefone={$_REQUEST['pTelefone']}&pDataNascimento={$_REQUEST['pDataNascimento']}&pEmail=$email&pSenha=$senha&pRg={$_REQUEST['pRg']}&pTipo={$_REQUEST['pTipo']}");
        } else {
            $nome = $_REQUEST['pNome'];
            $logradouro = $_REQUEST['pLogradouro'];
            $cidade = $_REQUEST['pCidade'];
            $estado = $_REQUEST['pEstado'];
            $cep = $_REQUEST['pCep'];
            $telefone = $_REQUEST['pTelefone'];
            $data_nascimento = $_REQUEST['pDataNascimento'];
            $rg = $_REQUEST['pRg'];
            $tipo = $_REQUEST['pTipo'];

            $clienteDAO->inserirCliente($cpf, $nome, $logradouro, $cidade, $estado, $cep, $telefone, $data_nascimento, $email, $senha, $rg, $tipo);
            header("Location: ../views/sucesso.php");
        }
        break;
    case 4:
        // Desativar Cliente
        session_start();
        if (isset($_SESSION['clienteLogado'])) {
            $cliente = $_SESSION['clienteLogado'];
            if ($cliente['tipo'] == 'D') {
                $aviso = "Este usuário foi desativado.";
            } else {
                $aviso = "";
            }
            header("Location: ../views/formCliente.php?cpf={$cliente['cpf']}&nome={$cliente['nome']}&logradouro={$cliente['logradouro']}&cidade={$cliente['cidade']}&estado={$cliente['estado']}&cep={$cliente['cep']}&telefone={$cliente['telefone']}&data_nascimento={$cliente['data_nascimento']}&email={$cliente['email']}&rg={$cliente['rg']}&tipo={$cliente['tipo']}&aviso={$aviso}");
        } else {
            header("Location: ../views/formLogin.php?erro=1");
        }
        break;
    case 5:
        //Editar cliente
        $clienteDAO = new ClienteDAO();
        $cpf = $_REQUEST['pCpf'];
        $nome = $_REQUEST['pNome'];
        $logradouro = $_REQUEST['pLogradouro'];
        $cidade = $_REQUEST['pCidade'];
        $estado = $_REQUEST['pEstado'];
        $cep = $_REQUEST['pCep'];
        $telefone = $_REQUEST['pTelefone'];
        $data_nascimento = $_REQUEST['pDataNascimento'];
        $email = $_REQUEST['pEmail'];
        $senha = $_REQUEST['pSenha'];
        $rg = $_REQUEST['pRg'];
        $tipo = $_REQUEST['pTipo'];

        $clienteDAO->atualizarCliente($cpf, $nome, $logradouro, $cidade, $estado, $cep, $telefone, $data_nascimento, $email, $senha, $rg, $tipo);
        if ($tipo == 'D') {
            echo "<script type='text/javascript'>
                    alert('O cliente foi desativado.');
                  </script>";
            header("Location: controllerCliente.php?pOpcao=2");
        } else {
            header("Location: ../views/sucesso.php");
        }
        break;
    case 6:
        //Ativar cliente
        $clienteDAO = new ClienteDAO();
        $email = $_REQUEST['pEmail'];
        $cliente = $clienteDAO->buscarClientePorEmail($email);
        if ($cliente) {
            $clienteDAO->atualizarTipoCliente($cliente['cpf'], 'C');
            header('Location: ../views/formLogin.php?ativado=1');
        } else {
            header('Location: ../views/formLogin.php?erro=1');
        }
        break;
}
