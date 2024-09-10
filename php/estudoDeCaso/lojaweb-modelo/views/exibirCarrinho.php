<?php
      require_once '../classes/item.inc.php';
      require_once 'includes/cabecalho.inc.php';
      require_once '../controlers/controllerCarrinho.php';

      $carrinho = $_SESSION['carrinho'];
?>

<h1 class="text-center">Carrinho de compra</h1>
<p> 
<?php
      if(isset($_REQUEST['status'])){
            include_once '../views/includes/carrinhoVazio.inc.php';
      }else{
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
            $somaTotalCarrinho = 0;
            $itensAgrupados = [];

            foreach($carrinho as $item){
                  $produto = $item->produto;
                  $refProduto = $produto['produto_id'];

                  if (!isset($itensAgrupados[$refProduto])) {
                    $itensAgrupados[$refProduto] = [
                        'produto' => $produto,
                        'quantidade' => 0,
                        'valorTotal' => 0
                    ];
                }
                  $itensAgrupados[$refProduto]['quantidade'] += $item->quantidade;
                  $itensAgrupados[$refProduto]['valorTotal'] = $itensAgrupados[$refProduto]['quantidade'] * $produto['preco'];
            }
            foreach ($itensAgrupados as $itemInfo) {
                $produto = $itemInfo['produto'];
                $quantidade = $itemInfo['quantidade'];
                $valorTotalItem = $itemInfo['valorTotal'];
                $somaTotalCarrinho += $valorTotalItem;
    
                ?>
            <tr class="align-middle" style="text-align: center">
                  <td><?= $contador ?></td>
                  <td><?=$produto['produto_id']?></td>
                  <td><?=$produto['nome']?></td>
                  <td><?=$produto['nome_fabricante']?></td>
                  <td>R$ <?=number_format($produto['preco'], 2, ',', '.')?></td>
                  <td><?= $quantidade ?></td>
                  <td>R$ <?= number_format($valorTotalItem, 2, ',', '.') ?></td>
                  <td><a href='../controlers/controllerCarrinho.php?pOpcao=3&index=<?=$contador-1?>' class='btn btn-danger btn-sm'>X</a></td>
                  
            </tr>

         <?php
            $contador++;
            }
         ?>

            <tr align="right">
                <td colspan="8">
                    <font face="Verdana" size="4" color="red"><b>Valor Total = R$ <?= number_format($somaTotalCarrinho, 2, ',', '.') ?></b></font>
                </td>
            </tr>
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
                        <a class="btn btn-success" role="button" href="../controlers/controllerCarrinho.php?pOpcao=5&total=<?=$somaTotalCarrinho?>"><b>Finalizar compra</b></a>
                  </div>
            </div>
      </div>

<?php
}
     require_once 'includes/rodape.inc.php';
?>