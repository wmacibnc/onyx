<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php

  $res = mysql_query("select * from cupom"); 
  
  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  
  echo "<h3>Cupons Cadastrados</h3>";
  echo "<a href='cupom/cadastro.php'> Novo </a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Nome</th>
        <th>Desconto (%)</th>
        <th>Validade</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
  </thead>

  <tbody>";

  while($cupom=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td>".$cupom['id'] ."</td>
    <td>".$cupom['nome'] ."</td>
    <td>".$cupom['desconto'] ."</td>
    <td>".$cupom['data_vencimento'] ."</td>

    <td>
    <form method='post' action='cupom/editar.php'> 
    <input type='hidden' name='id' value='".$cupom['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    </td>

    <td>
    <form method='post' action='cupom/deletar.php'> 
    <input type='hidden' name='id' value='".$cupom['id']."'/>
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