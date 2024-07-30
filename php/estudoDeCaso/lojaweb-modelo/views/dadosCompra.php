<?php 
      require_once "includes/cabecalho.inc.php";

 ?>

<h1 class="text-center">Dados do cliente</h1>

<p>&nbsp;
<div style="font-size: 1.25rem;">
      <p><b>Nome:</b> Nome do cliente
      <p><b>CPF:</b> CPF do cliente
      <p><b>Endereço Completo:</b> Endereço com todos os campos.
      <p><b>Telefone:</b> Telefone do cliente
      <p><b>Email:</b> E-mail do cliente
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
          // percurso do carrinho aqui!

?>
            <tr class="align-middle" style="text-align: center">
                  <td><img src="imagens/produtos/produto.jpg" width="100" height="100" border="0"></td>
                  <td>ID 0</td>
                  <td>Nome aqui</td>
                  <td>Fabricante XXX</td>
                  <td>R$ 000,00</td>
                  <td>N</td>
                  <td>R$ N * 000,00</td>
            </tr>
          <!-- percurso termina aqui -->
            
          <tr align="right"><td colspan="7"><font face="Verdana" size="4" color="red"><b>Valor Total = R$ total</b></font></td></tr>
          </table>
          <div class="container text-center">
            <div class="row">
                  <div class="col">
                        <a class="btn btn-success" role="button" href="#"><b>Efetuar o pagamento</b></a>
                  </div>                 
            </div>
         </div>

<!-- Rodape -->

<?php require_once "includes/rodape.inc.php" ?>
