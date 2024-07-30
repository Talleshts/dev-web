
<?php
    require_once 'includes/cabecalho.inc.php';
?>
<p>
<h1 class="text-center">Alteração de produto</h1>
<p> 

<form class="row g-3" action="#" method="post">

<div class="col-md-2">
    <label for="pId" class="form-label">ID</label>
    <input type="text" class="form-control" name="pId" value="ID AQUI" readonly>
  </div>  
<div class="col-md-3">
    <label for="pReferencia" class="form-label">Nº Referencia</label>
    <input type="text" class="form-control" name="pReferencia" value="REFERENCIA AQUI" readonly>
  </div>
  <div class="col-md-7">
    <label for="pNome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="pNome" value="NOME AQUI">
  </div>
  <div class="col-md-3">
    <label for="pPreco" class="form-label">Preço</label>
    <input type="text" class="form-control" name="pPreco" value="PRECO AQUI">
  </div>
  <div class="col-md-3">
    <label for="pDataFabricacao" class="form-label">Data de fabricação</label>
    <input type="date" class="form-control" name="pDataFabricacao" value="DATA AQUI">
  </div>
  <div class="col-md-4">
    <label for="pFabricante" class="form-label">Fabricante</label>
    <select name="pFabricante" class="form-select">
      <option selected value="0">Escolha...</option>
      <?php
        // MOSTRAR A LISTA DE FABRICANTES AQUI                   
      ?>
    </select>
  </div>
  <div class="col-md-2">
    <label for="pEstoque" class="form-label">Qde Estoque</label>
    <input type="text" class="form-control" name="pEstoque" value="ESTOQUE AQUI">
  </div>
  <div class="col-12">
    <label for="pDescricao" class="form-label">Descrição do produto: </label>
    <textarea class="form-control" name="pDescricao" rows="6" style="resize: none">DESCRIÇÃO AQUI</textarea>    
  </div>
  <div class="col-12">
    <label for="pResumo" class="form-label">Resumo do produto: </label>
    <textarea class="form-control" name="pResumo" rows="6" style="resize: none">RESUMO AQUI</textarea>    
  </div>
  <div class="col-12 text-center">
    <button type="submit" class="btn btn-success">Alterar</button>
  </div>
  <input type="hidden" name="opcao" value="5">
</form>

<?php
       require_once 'includes/rodape.inc.php';
?>