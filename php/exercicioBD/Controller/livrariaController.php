<?php
    require_once './../Dao/livariaDAO.inc.php';
    
    $opcao = $_REQUEST['opcao'];

    switch ($opcao) {
        case '1':
            $livroDAO = new LivrariaDAO();
            $isbn = $_REQUEST['isbn'];
            $titulo = $_REQUEST['titulo'];
            $edicao_num = $_REQUEST['edicao_num'];
            $ano_publicacao = $_REQUEST['ano_publicacao'];
            $descricao = $_REQUEST['descricao'];
            if(empty($isbn) || empty($titulo) || empty($edicao_num) || empty($ano_publicacao) || empty($descricao)){
                echo "<script>alert('Preencha todos os campos!'); window.location.href = '../Ex01/formCadastroLivro.php'; </script>";
                exit;
            }else{
                $livro = $livroDAO->insert($isbn, $titulo, $edicao_num, $ano_publicacao, $descricao);
                break;
            }
        case '2':
            $livroDAO = new LivrariaDAO();
            $isbn = $_REQUEST['isbn'];
            if(empty($isbn)){
                echo "<script>alert('Preencha o campo ISBN!'); window.location.href = '../Ex02/formBuscaLivro.php'; </script>";
                exit;
            }else{
                $livro = $livroDAO->search($isbn);
                break;
            }
        
        case '3':
            $livroDAO = new LivrariaDAO();
            $isbn = $_REQUEST['isbn'];
            if(empty($isbn)){
                echo "<script>alert('Preencha o campo ISBN!'); window.location.href = '../Ex03/formFindByISBN.php'; </script>";
                exit;
            }else{
                $livro = $livroDAO->findByISBN($isbn);
                break;
            }
        case '4':
            session_start();
            $livroDAO = new LivrariaDAO();
            if (!isset($_SESSION['livro']['isbn'])) {
                echo "<script>alert('Erro: ISBN não encontrado na sessão.'); window.location.href = '../Ex03/formFindByISBN.php';</script>";
                exit;
            }
            $isbn = $_SESSION['livro']['isbn'];
            $novo_isbn = $_REQUEST['novo_isbn'];
            if(empty($novo_isbn)){
                $novo_isbn = $isbn;
            }
            $titulo = $_REQUEST['titulo'];
            $edicao_num = $_REQUEST['edicao_num'];
            $ano_publicacao = $_REQUEST['ano_publicacao'];
            $descricao = $_REQUEST['descricao'];
            if (empty($isbn) || empty($titulo) || empty($edicao_num) || empty($ano_publicacao) || empty($descricao)) {
                echo "<h1>$isbn; $novo_isbn; $titulo; $edicao_num; $ano_publicacao; $descricao</h1>";
                // echo "<script>alert('Preencha todos os campos obrigatórios!'); window.location.href = '../Ex03/formUpdateLivro.php'; </script>";
                exit;
            } else {
                $livroDAO->update($isbn, $novo_isbn, $titulo, $edicao_num, $ano_publicacao, $descricao);
                echo "<script>alert('Atualização concluída'); window.location.href = '../Ex03/formUpdateLivro.php';</script>";
            }
        default:
            echo "<h1>Opção inválida, retorne a tela inicial.</h1>";
            echo "<a href='index.php'>Voltar</a>";
            exit;
            break;
    }


?>