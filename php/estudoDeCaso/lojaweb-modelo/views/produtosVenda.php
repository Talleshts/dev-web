<?php
include_once 'includes/cabecalho.inc.php';

require_once '../classes/produto.inc.php';

$produtos = $_SESSION['produtos'];

?>
<h1 class="text-center">Show room de produtos</h1>
<p>

<div class="row row-cols-1 row-cols-md-5 g-4">

  <?php
  foreach ($produtos as $produto) {
  ?>

    <div class="col">
      <div class="card">
        <img src="imagens/produtos/<?= $produto->referencia ?>.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $produto->nome ?> </h5>
          <p class="card-text"><?= $produto->resumo ?></p>
          <h6 class="card-text text-end">Marca: <?= $produto->nome_fabricante ?></h6>
          <p class="card-text text-center" style="background-color: #ccc; border: 1px solid #000;">Quantidade disponível: <?= $produto->estoque ?></p>
          <h4 class="card-title">R$ <?= $produto->preco ?></h4>
          <div class="text-end"><?php echo "<a href='../controlers/controllerCarrinho.php?pOpcao=1&id=" . $produto->produto_id . "' class='btn btn-danger'>Comprar</a>" ?></div>
        </div>
      </div>
    </div>

  <?php
  }
  ?>
</div>

<?php require_once "includes/rodape.inc.php" ?>