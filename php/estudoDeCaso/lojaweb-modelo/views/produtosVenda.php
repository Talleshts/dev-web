
<?php
      include_once 'includes/cabecalho.inc.php';
?>
<h1 class="text-center">Show room de produtos</h1>
<p> 

<div class="row row-cols-1 row-cols-md-5 g-4">

<?php
  //percurso inicia aqui  
?>

<div class="col">
    <div class="card">
      <img src="imagens/produtos/produto.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">NOME</h5>
        <p class="card-text">RESUMO</p>
        <h6 class="card-text text-end">Marca: FABRICANTE</h6>
        <h4 class="card-title">R$ 000,00</h4>
        <div class="text-end"><?php echo "<a href='#' class='btn btn-danger'>Comprar</a>" ?></div>        
      </div>
    </div>
</div>

<!-- esse card adicional somente para representar o loop -->
<div class="col">
    <div class="card">
      <img src="imagens/produtos/produto.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">NOME</h5>
        <p class="card-text">RESUMO</p>
        <h6 class="card-text text-end">Marca: FABRICANTE</h6>
        <h4 class="card-title">R$ 000,00</h4>
        <div class="text-end"><?php echo "<a href='#' class='btn btn-danger'>Comprar</a>" ?></div>        
      </div>
    </div>
</div>

  <?php
    // percurso termina aqui
  ?>
</div>

<?php require_once "includes/rodape.inc.php" ?>
