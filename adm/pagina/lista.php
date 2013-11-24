<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php

  $res = mysql_query("select * from paginas"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  echo "<h3>P&aacute;ginas Cadastradas</h3>";
    echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example' align='center'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Nome P&aacute;gina</th>
        <th>Atualizar</th>
      </tr>
  </thead>

  <tbody>";

  while($pagina=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr align='center'>

    <td>".$pagina['id'] ."</td>
    <td>".$pagina['nomePagina'] ."</td>

    <td>
    <form method='post' action='pagina/editar.php'> 
    <input type='hidden' name='id' value='".$pagina['id']."'/>
    <input name='Atualizar' type='submit' value='Atualizar' />
    </form>
    </td>

    </tr>
    ";
  }
  ?>
</tbody>
    </table>
<?php include("../footer.php"); ?>