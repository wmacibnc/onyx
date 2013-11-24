<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php

  $res = mysql_query("select * from parametrizacao"); 
  
  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  
  echo "<h3>Parametros do sistema Cadastrados</h3>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Paramêtro</th>
        <th>Valor</th>
        <th>Editar</th>
      </tr>
  </thead>

  <tbody>";

  while($parametrizacao=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td align='center'>".$parametrizacao['id'] ."</td>
    <td align='center'>".$parametrizacao['parametro'] ."</td>
    <td align='center'>".$parametrizacao['valor'] ."</td>

    <td align='center'>
    <form method='post' action='parametrizacao/editar.php'> 
    <input type='hidden' name='id' value='".$parametrizacao['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    </td>

   </tr>
    ";
  }
  ?>
</tbody>
    </table>
<?php include("../footer.php"); ?>