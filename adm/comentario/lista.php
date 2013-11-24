<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php

  $res = mysql_query("select * from comentario"); 
  
  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  
  echo "<h3>Comentários Cadastrados</h3>";
  echo "<a href='comentario/cadastro.php'> Novo </a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Nome</th>
        <th>Cidade</th>
        <th>Texto</th>
        <th>Ativo</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
  </thead>

  <tbody>";

  while($comentario=mysql_fetch_array($res)){


    $ativo ="";
    if($comentario['ativo'] == 1){
    $ativo ="Sim";
    }else{
    $ativo="Não";
    }
    echo "  

    <tr>

    <td>".$comentario['id'] ."</td>
    <td>".$comentario['nome'] ."</td>
    <td>".$comentario['cidade'] ."</td>
    <td>".$comentario['texto'] ."</td>
    <td>".$ativo."</td>

    <td>
    <form method='post' action='comentario/editar.php'> 
    <input type='hidden' name='id' value='".$comentario['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    </td>

    <td>
    <form method='post' action='comentario/deletar.php'> 
    <input type='hidden' name='id' value='".$comentario['id']."'/>
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