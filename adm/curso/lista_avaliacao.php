<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php
$curso_id = $_GET['curso_id'];
$res = mysql_query("select * from questionario where curso_id=".$curso_id); 
$resultado = mysql_query("select * from curso where id=".$curso_id);
$curso = mysql_fetch_array($resultado);

  echo "<h3>Questões Cadastradas</h3>";
  echo "<h3>Curso: ".$curso['nome']."</h3>";
  echo "<a href='curso/cadastra_avaliacao.php'>
  <img src='../imagens/icone/curso_adiciona-icone.png'>
  </a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Id</th>
        <th>Pergunta</th>
        <th>Res-1</th>
        <th>Res-2</th>
        <th>Res-3</th>
        <th>Res-4</th>
        <th>*</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
  </thead>

  <tbody>";

  while($questionario=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td align='center'>".$questionario['id'] ."</td>
    <td align='center'>".$questionario['pergunta'] ."</td>
    <td align='center'>".$questionario['resposta1'] ."</td>
    <td align='center'>".$questionario['resposta2'] ."</td>
    <td align='center'>".$questionario['resposta3'] ."</td>
    <td align='center'>".$questionario['resposta4'] ."</td>
    <td align='center'>".$questionario['respostaCorreta'] ."</td>

    <td>
    <form method='post' action='curso/editar_avaliacao.php'> 
    <input type='hidden' name='id' value='".$questionario['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    </td>
    <td>
    <form method='post' action='curso/deletar_avaliacao.php'> 
    <input type='hidden' name='id' value='".$questionario['id']."'/>
    <input type='hidden' name='curso_id' value='".$questionario['curso_id']."'/>
    <input name='Excluir' type='submit' value='Excluir' />
    </form>
    </td>

    </tr>
    ";
  }
  ?>
</tbody>
    </table>
    <p align="center">Instituto Onyx - Todos os direitos reservados.</p>
<?php include("../footer.php"); ?>