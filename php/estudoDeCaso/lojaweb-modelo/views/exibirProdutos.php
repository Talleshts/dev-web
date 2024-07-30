<?php        
      require_once 'includes/cabecalho.inc.php';   
?>
<p>
<h1 class="text-center">Produtos do estoque</h1>
<p> 
<div class="table-responsive">
<table class="table table-light table-hover">
      <thead class="table-primary">
            <tr class="align-middle" style="text-align: center">
                <th witdh="10%">ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data de Fabricação</th>
                <th>Preço unitário</th>
                <th>Em Estoque</th>
                <th>Fabricante</th>
                <th>Operação</th>
            </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
         // percurso aqui
               echo "<tr align='center'>";
               echo "<td>"."ID 0"."</td>";
               echo "<td><strong>"."NOME"."</strong></td>";
               echo "<td>"."RESUMO"."</td>";
               echo "<td>"."DATA FORMATADA"."</td>";
               echo "<td>"."R$ PREÇO"."</td>";
               echo "<td>"."ESTOQUE"."</td>";
               echo "<td>"."FABRICANTE"."</td>";
               echo "<td><a href='#' class='btn btn-success btn-sm'>A</a> ";
               echo "<a href='#' class='btn btn-danger btn-sm'>X</a></td>";
               echo "</tr>";
         
      ?>
      </tbody>  
</table>
</div>

<?php
       require_once 'includes/rodape.inc.php';
?>

