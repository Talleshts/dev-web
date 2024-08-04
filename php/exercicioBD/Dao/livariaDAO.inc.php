<?php
require_once 'conexao.inc.php';


class LivrariaDAO{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function insert($isbn, $titulo, $edicao_num, $ano_publicacao, $descricao){
        $sql = $this->con->prepare("insert into livros 
        (isbn, titulo, edicao_num, ano_publicacao, descricao) 
        values (:isbn, :titulo, :edicao_num, :ano_publicacao, :descricao)");

        $sql->bindValue(":isbn", $isbn);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":edicao_num", $edicao_num);
        $sql->bindValue(":ano_publicacao", $ano_publicacao);
        $sql->bindValue(":descricao", $descricao);
        
        $sql->execute();

        echo "<script>alert('Inserção concluída'); window.location.href = '../Ex01/formCadastroLivro.php';</script>";
        exit;
    }

    function search($isbn){
        session_start();
        $sql = $this->con->prepare("select * from livros where isbn LIKE CONCAT('%', :isbn, '%')");
        $sql->bindValue(":isbn", $isbn);
        $sql->execute();

        if($sql->rowCount() <= 0){
            echo "<script>alert('Livro não encontrado!'); window.location.href = '../Ex02/formBuscaLivro.php';</script>";
            exit;
        }else{
            $livros = $sql->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['livros'] = $livros;
            header("Location: ../Ex02/mostraLivro.php");
            exit;
        }
    }

    function findByISBN($isbn){
        session_start();
        $sql = $this->con->prepare("select * from livros where isbn = :isbn");
        $sql->bindValue(":isbn", $isbn);
        $sql->execute();

        if($sql->rowCount() <= 0){
            echo "<script>alert('Livro não encontrado!'); window.location.href = '../Ex03/formFindByISBN.php';</script>";
            exit;
        }else{
            $livro = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['livro'] = $livro;
            header("Location: ../Ex03/formUpdateLivro.php");
            exit;
        }
    }

    public function update($isbn, $novo_isbn, $titulo, $edicao_num, $ano_publicacao, $descricao) {
        $sql = $this->con->prepare("UPDATE livros SET isbn = :novo_isbn, titulo = :titulo, edicao_num = :edicao_num, ano_publicacao = :ano_publicacao, descricao = :descricao WHERE isbn = :isbn");
    
        $sql->bindValue(":isbn", $isbn);
        $sql->bindValue(":novo_isbn", $novo_isbn);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":edicao_num", $edicao_num);
        $sql->bindValue(":ano_publicacao", $ano_publicacao);
        $sql->bindValue(":descricao", $descricao);
        
        $sql->execute();
    }

}

?>