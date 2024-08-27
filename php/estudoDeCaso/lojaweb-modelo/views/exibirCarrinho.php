<?php
      require_once '../classes/item.inc.php';
      require_once 'includes/cabecalho.inc.php';
      require_once '../controlers/controllerCarrinho.php';

      $carrinho = $_SESSION['carrinho'];
?>

<h1 class="text-center">Carrinho de compra</h1>
<p> 
<?php

?>
<div class="table-responsive">
<table class="table table-ligth table-striped">
      <thead class="table-danger">
            <tr class="align-middle" style="text-align: center">
                <th witdh="10%">Item No</th>
                <th>Ref.</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Preço</th>
                <th>Qde.</th>
                <th>Total</th>                
                <th>Remover</th>
            </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
            $contador = 1;
            $soma = 0;         
            foreach($carrinho as $item){
                  $produto = $item->produto;
      ?>
            <tr class="align-middle" style="text-align: center">
                  <td><?= $contador ?></td>
                  <td><?=$produto->$produto_id?></td>
                  <td><?=$produto->$nome?></td>
                  <td><?=$item->$produto['cod_fabricante']?></td>
                  <td>R$ <?=$item->$produto['preco']?></td>
                  <td>N</td>
                  <td>R$ Valor Item</td>
                  <td><a href="#" class='btn btn-danger btn-sm'>X</a></td>
                  
            </tr>

         <?php
            $contador++;
            $soma+=$item->$produto['preco'];
            }
         ?>

            <tr align="right"><td colspan="8"><font face="Verdana" size="4" color="red"><b>Valor Total = R$ <?= $soma ?></b></font></td></tr>
      </table> 
      <div class="container text-center">
            <div class="row">
                  <div class="col">
                        <a class="btn btn-warning" role="button" href="../controlers/controllerProduto.php?pOpcao=6"><b>Continuar comprando</b></a>
                  </div>
                  <div class="col">
                        <a class="btn btn-danger" role="button" href="../controlers/controllerCarrinho.php?pOpcao=2"><b>Esvaziar carrinho</b></a>
                  </div>
                  <div class="col">
                        <a class="btn btn-success" role="button" href="#"><b>Finalizar compra</b></a>
                  </div>
            </div>
      </div>

<?php
     require_once 'includes/rodape.inc.php';
?>