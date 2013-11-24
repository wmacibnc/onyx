<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php

  $res = mysql_query("select * from grupo_curso"); 
  
  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  
  echo "<h3>Grupo de Cursos Cadastrados</h3>";
  echo "<a href='grupocurso/cadastro.php'> Novo </a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Nome</th>
        <th>Observação</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
  </thead>

  <tbody>";

  while($grupocurso=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td>".$grupocurso['id'] ."</td>
    <td>".$grupocurso['nome'] ."</td>
    <td>".$grupocurso['observacao'] ."</td>

    <td>
    <form method='post' action='grupocurso/editar.php'> 
    <input type='hidden' name='id' value='".$grupocurso['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    </td>

    <td>
    <form method='post' action='grupocurso/deletar.php'> 
    <input type='hidden' name='id' value='".$grupocurso['id']."'/>
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