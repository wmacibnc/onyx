<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo">
 teste
<div id="progressbar" style="width: 50%;">teste</div>
  <?php

  $res = mysql_query("select * from convenio"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  echo "<h3>Conv&ecirc;nios Cadastrados</h3>";
  echo "<a href='cadastra_convenio.php'> Novo </a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Logo</th>
        <th>Categoria</th>
        <th>Nome</th>
        <th>Resumo</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
  </thead>

  <tbody>";

  while($convenio=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td>".$convenio['id'] ."</td>
    <td><img src='../uploads/convenio/". $convenio['logo']."' width='50px' height='auto'/> </td>
    <td>".$convenio['categoria_id'] ."</td>
    <td>".$convenio['nome'] ."</td>
    <td>".$convenio['resumo'] ."</td>

    <td>
    <form method='post' action='editar.php'> 
    <input type='hidden' name='id' value='".$convenio['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    </td>

    <td>
    <form method='post' action='deletar.php'> 
    <input type='hidden' name='id' value='".$convenio['id']."'/>
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