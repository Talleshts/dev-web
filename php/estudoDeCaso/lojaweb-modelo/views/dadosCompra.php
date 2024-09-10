<?php 
      require_once '../classes/item.inc.php';
      require_once "includes/cabecalho.inc.php";
      require_once '../controlers/controllerCarrinho.php';
      $cliente = $_SESSION['clienteLogado'];
      $carrinho = $_SESSION['carrinho'];
 ?>

<h1 class="text-center">Dados do cliente</h1>

<p>&nbsp;
<div style="font-size: 1.25rem;">
      <p><b>Nome:</b> <?=$cliente['nome']?>
      <p><b>CPF:</b> <?=$cliente['cpf']?>
      <p><b>Endereço Completo:</b> <?=$cliente['logradouro']?>
      <p><b>Telefone:</b> <?=$cliente['telefone']?>
      <p><b>Email:</b> <?=$cliente['email']?>
      </font>
      <p><hr><p>&nbsp;
</div>

<h1 class="text-center">Dados da compra</h1>
<p>

<div class="table-responsive">
<table class="table">
      <thead class="table-success">
            <tr class="align-middle" style="text-align: center">
                <th witdh="10%">Item</th>
                <th>Referencia</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Preço</th>
                <th>Qde.</th>
                <th>Valor</th>                
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
            <td><img src="imagens/produtos/<?= $produto['referencia'] ?>.jpg" width="100" height="100" border="0"></td>
            <td><?=$produto['produto_id']?></td>
            <td><?=$produto['nome']?></td>
            <td><?=$produto['nome_fabricante']?></td>
            <td>R$ <?=number_format($produto['preco'], 2, ',', '.')?></td>
            <td><?= $quantidade ?></td>
            <td>R$ <?= number_format($valorTotalItem, 2, ',', '.') ?></td>
      </tr>
          <!-- percurso termina aqui -->
      <?php
            $contador++;
            }
      ?>  

      <tr align="right"><td colspan="7"><font face="Verdana" size="4" color="red"><b>Valor Total = R$ <?= number_format($somaTotalCarrinho, 2, ',', '.') ?></b></font></td></tr>
</table>
          <div class="container text-center">
            <div class="row">
                  <div class="col">
                        <a class="btn btn-success" role="button" href="dadosPagamento.php"><b>Efetuar o pagamento</b></a>
                  </div>                 
            </div>
         </div>

<!-- Rodape -->

<?php

require_once "includes/rodape.inc.php" 
?>
