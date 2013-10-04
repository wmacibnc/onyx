<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">
	<h3>Lista de Cursos</h3>
	<?php 
	$res = mysql_query("select * from curso"); 

  		echo "<a href='curso/cadastro.php'> Novo </a>";
  		echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Grupo</th>
        <th>Nome</th>
        <th>Aulas</th>
        <th>Contéudo</th>
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

    <td>".$curso['id'] ."</td>
    <td>".$grupo."</td>
    <td>".$curso['nome'] ."</td>
    <td>".$curso['qtd_aula'] ."</td>

    <td><a href='curso/lista_dados_curso.php?curso=".$curso['id']."'>Contéudo</a></td></tr>";
  }
  ?>
</tbody>
    </table>
</div>
<?php include("../footer.php"); ?>