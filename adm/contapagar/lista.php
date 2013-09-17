<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo">

  <?php

  $res = mysql_query("select * from contapagar"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  echo "<h3>Contas a Pagar Cadastradas</h3>";
  echo "<a href='cadastro.php'> Novo </a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Nome</th>
        <th>Data Vencimento</th>
        <th>Data Pagamento</th>
        <th>Valor</th>
        <th>Observa&ccedil;&atilde;o</th>
        <th>A&ccedil;&atilde;o</th>
      </tr>
  </thead>

  <tbody>";

  while($contapagar=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td>".$contapagar['id'] ."</td>
    <td>".$contapagar['nome'] ."</td>
    <td>".$contapagar['datavencimento'] ."</td>
    <td>".$contapagar['datapagamento'] ."</td>
    <td>".$contapagar['valor'] ."</td>
    <td>".$contapagar['observacao'] ."</td>

    <td>
    <form method='post' action='editar.php'> 
    <input type='hidden' name='id' value='".$contapagar['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    <form method='post' action='deletar.php'> 
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