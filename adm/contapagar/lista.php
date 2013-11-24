<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php

  $res = mysql_query("select * from contapagar"); 
  
  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  
  echo "<h3>Contas a pagar Cadastradas</h3>";
  echo "<a href='contapagar/cadastro.php'> Novo </a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Nome</th>
        <th>Valor</th>
        <th>Data Vencimento</th>
        <th>Data Pagamento</th>
        <th>Observação</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
  </thead>

  <tbody>";

  while($contapagar=mysql_fetch_array($res)){


    echo "  

    <tr>

    <td>".$contapagar['id'] ."</td>
    <td>".$contapagar['nome'] ."</td>
    <td>".$contapagar['valor'] ."</td>
    <td>".$contapagar['datavencimento'] ."</td>
    <td>".$contapagar['datapagamento'] ."</td>
    <td>".$contapagar['observacao'] ."</td>


    <td>
    <form method='post' action='contapagar/editar.php'> 
    <input type='hidden' name='id' value='".$contapagar['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    </td>

    <td>
    <form method='post' action='contapagar/deletar.php'> 
    <input type='hidden' name='id' value='".$contapagar['id']."'/>
    <input name='Excluir' type='submit' value='Excluir' />
    </form>
    </td>

    </tr>
    ";
  }
  ?>
</tbody>
    </table>
<?php include("../footer.php"); ?>