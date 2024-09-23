<?php
require_once "includes/cabecalho.inc.php";
require_once '../dao/fabricanteDAO.inc.php';

$fabricanteDao = new FabricanteDAO();
$lista = $fabricanteDao->getFabricantes();
?>
<div class="container">
    <h1 class="mt-5">Lista de Fabricantes</h1>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Ramo</th>
                <th>Logradouro</th>
                <th>Cidade</th>
                <th>CEP</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $fabricante): ?>
                <tr>
                    <td><?php echo $fabricante->codigo; ?></td>
                    <td><?php echo $fabricante->nome; ?></td>
                    <td><?php echo $fabricante->ramo; ?></td>
                    <td><?php echo $fabricante->logradouro; ?></td>
                    <td><?php echo $fabricante->cidade; ?></td>
                    <td><?php echo $fabricante->cep; ?></td>
                    <td><?php echo $fabricante->email; ?></td>
                    <td>
                        <a href="formAddFabricante.php?codigo=<?php echo $fabricante->codigo; ?>&nome=<?php echo $fabricante->nome; ?>&ramo=<?php echo $fabricante->ramo; ?>&logradouro=<?php echo $fabricante->logradouro; ?>&cidade=<?php echo $fabricante->cidade; ?>&cep=<?php echo $fabricante->cep; ?>&email=<?php echo $fabricante->email; ?>" class="btn btn-warning btn-sm">Alterar</a>
                        <a href="../controlers/controllerFabricante.php?pOpcao=5&codigo=<?php echo $fabricante->codigo; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este fabricante?');">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once "includes/rodape.inc.php"; ?>