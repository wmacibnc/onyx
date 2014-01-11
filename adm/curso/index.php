<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">
	<h3>Lista de Cursos</h3>
	<?php 
	$res = mysql_query("select * from curso"); 

  		echo "<a href='curso/cadastro.php'> <img src='../imagens/icone/curso_adiciona-icone.png'> </a>";
  		echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Grupo</th>
        <th>Nome</th>
        <th>Validade</th>
        <th>Cont&eacute;udo</th>
        <th>Avaliação</th>
      </tr>
  </thead>

  <tbody>";
  
  
  while($curso=mysql_fetch_array($res)){

  $grupo_id = $curso['grupo_id'];

  $resultado = mysql_query("select * from grupo_curso where id=".$grupo_id."");
  $row = mysql_fetch_array($resultado);
  $grupo = $row['nome'];

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td align='center'>".$curso['id'] ."</td>
    <td align='center'>".$grupo."</td>
    <td align='center'>".$curso['nome'] ."</td>
    <td align='center'>".$curso['validade'] ." dias</td>

    <td><a href='curso/adiciona_conteudo.php?curso=".$curso['id']."'>Contéudo</a></td>
    <td><a href='curso/lista_avaliacao.php?curso_id=".$curso['id']."'>Listar</a></td></tr>";
  }
  ?>
</tbody>
    </table>
</div>
<?php include("../footer.php"); ?>