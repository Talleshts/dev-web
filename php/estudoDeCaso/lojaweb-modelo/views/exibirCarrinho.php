<?php
require_once '../classes/item.inc.php';
require_once 'includes/cabecalho.inc.php';
require_once '../controlers/controllerCarrinho.php';

if (!isset($_SESSION['carrinho'])) {
      $_SESSION['carrinho'] = array();
} else {
      $carrinho = $_SESSION['carrinho'];
}
?>

<h1 class="text-center">Carrinho de compra</h1>
<p>
      <?php
      if (empty($carrinho)) {
            include_once '../views/includes/carrinhoVazio.inc.php';
      } else {
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

                  foreach ($carrinho as $index => $item) {
                  ?>
                        <tr class="align-middle" style="text-align: center">
                              <td><?= $contador ?></td>
                              <td><?= $item->produto->produto_id ?></td>
                              <td><?= $item->produto->nome ?></td>
                              <td><?= $item->produto->nome_fabricante ?></td>
                              <td>R$ <?= number_format($item->produto->preco, 2, ',', '.') ?></td>
                              <td>
                                    <form action="../controlers/controllerCarrinho.php" method="post">
                                          <input type="number" name="quantidade" value="<?= $item->quantidade ?>" min="1" style="width: 60px;">
                                          <input type="hidden" name="index" value="<?= $index ?>">
                                          <button type="submit" name="pOpcao" value="4" class="btn btn-primary btn-sm">Atualizar</button>
                                    </form>
                              </td>
                              <td>R$ <?= number_format($item->valorItem, 2, ',', '.') ?></td>
                              <td><a href='../controlers/controllerCarrinho.php?pOpcao=3&index=<?= $index ?>' class='btn btn-danger btn-sm'>X</a></td>
                        </tr>

                  <?php
                        $contador++;
                        $somaTotalCarrinho += $item->valorItem;
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
                        <a class="btn btn-success" role="button" href="../controlers/controllerCarrinho.php?pOpcao=5&total=<?= $somaTotalCarrinho ?>"><b>Finalizar compra</b></a>
                  </div>
            </div>
      </div>

<?php
      }
      require_once 'includes/rodape.inc.php';
?>