<?php
require_once '../classes/produto.inc.php';

require_once '../utils/funcoesUteis.php';

require_once 'includes/cabecalho.inc.php';

$produto = $_SESSION['produto'];
$fabricantes = $_SESSION['fabricantes'];
?>
<p>
<h1 class="text-center">Alteração de produto</h1>
<p>

<form class="row g-3" action="../controlers/controllerProduto.php" method="post">

  <div class="col-md-2">
    <label for="pId" class="form-label">ID</label>
    <input type="text" class="form-control" name="pId" value="<?= $produto->produto_id ?>" readonly>
  </div>
  <div class="col-md-3">
    <label for="pReferencia" class="form-label">Nº Referencia</label>
    <input type="text" class="form-control" name="pReferencia" value="<?= $produto->referencia ?>" readonly>
  </div>
  <div class="col-md-7">
    <label for="pNome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="pNome" value="<?= $produto->nome  ?>">
  </div>
  <div class="col-md-3">
    <label for="pPreco" class="form-label">Preço</label>
    <input type="text" class="form-control" name="pPreco" value="<?= $produto->preco ?>">
  </div>
  <div class="col-md-3">
    <label for="pDataFabricacao" class="form-label">Data de fabricação</label>
    <input type="date" class="form-control" name="pDataFabricacao" value="<?= $produto->data_fabricacao ?>">
  </div>
  <div class="col-md-4">
    <label for="pFabricante" class="form-label">Fabricante</label>
    <select name="pFabricante" class="form-select">
      <option value="0">Escolha...</option>
      <?php
      foreach ($fabricantes as $fab) {
        if ($fab->codigo == $produto->cod_fabricante) {
          echo "<option selected value='$fab->codigo'>$fab->nome</option>";
        } else {
          echo "<option value='$fab->codigo'>$fab->nome</option>";
        }
      }
      ?>
    </select>
  </div>
  <div class="col-md-2">
    <label for="pEstoque" class="form-label">Qde Estoque</label>
    <input type="text" class="form-control" name="pEstoque" value="<?= $produto->estoque ?>">
  </div>
  <div class="col-12">
    <label for="pDescricao" class="form-label">Descrição do produto: </label>
    <textarea class="form-control" name="pDescricao" rows="6" style="resize: none"><?= $produto->descricao ?></textarea>
  </div>
  <div class="col-12">
    <label for="pResumo" class="form-label">Resumo do produto: </label>
    <textarea class="form-control" name="pResumo" rows="6" style="resize: none"><?= $produto->resumo ?></textarea>
  </div>
  <div class="col-12 text-center">
    <button type="submit" class="btn btn-success">Alterar</button>
  </div>
  <input type="hidden" name="opcao" value="5">
</form>

<?php
require_once 'includes/rodape.inc.php';
?>