<?php
     require_once 'includes/cabecalho.inc.php';
?>
      <center>
        <h2><font face="Arial">Opção de Pagamento</font></h2>
      <p>
      Escolha a sua opção de pagamento:
      <form action="#" method="get">
            <input type="radio" name="pag" value="boleto"> Boleto Bancário<p>
            <input type="radio" name="pag" value="cartao"> Cartão de Crédito<p>
            <input type="hidden" value="1" name="pOpcao">
            <input type="submit" value="Efetuar Pagamento">
      </form>
<?php
       require_once('includes/rodape.inc.php');
?>