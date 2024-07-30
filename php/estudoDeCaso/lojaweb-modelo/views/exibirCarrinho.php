<?php
     require_once 'includes/cabecalho.inc.php';
    
?>

<h1 class="text-center">Carrinho de compra</h1>
<p> 
<?php
     // validação de carrinho vazio

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

          // percurso inicia aqui             
      ?>
            <tr class="align-middle" style="text-align: center">
                  <td>0</td>
                  <td>ID 0</td>
                  <td>Nome aqui</td>
                  <td>Fabricante aqui</td>
                  <td>R$ 000,00</td>
                  <td>N</td>
                  <td>R$ Valor Item</td>
                  <td><a href="#" class='btn btn-danger btn-sm'>X</a></td>
                  
            </tr>

          <!-- percurso termina aqui -->
         
            <tr align="right"><td colspan="8"><font face="Verdana" size="4" color="red"><b>Valor Total = R$ total</b></font></td></tr>
      </table> 
      <div class="container text-center">
            <div class="row">
                  <div class="col">
                        <a class="btn btn-warning" role="button" href="#"><b>Continuar comprando</b></a>
                  </div>
                  <div class="col">
                        <a class="btn btn-danger" role="button" href="#"><b>Esvaziar carrinho</b></a>
                  </div>
                  <div class="col">
                        <a class="btn btn-success" role="button" href="#"><b>Finalizar compra</b></a>
                  </div>
            </div>
      </div>

<?php
     require_once 'includes/rodape.inc.php';
?>