<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">
	<h3>Lista de Cursos</h3>
	<?php 
	$res = mysql_query("select * from curso"); 

  		echo "<a href='cadastro.php'> Novo </a>";
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

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td>".$curso['id'] ."</td>
    <td>".$curso['grupo_id'] ."</td>
    <td>".$curso['nome'] ."</td>
    <td>".$curso['qtd_aula'] ."</td>

    <td><a href='lista_dados_curso.php?curso=".$curso['id']."'>Contéudo</a></td></tr>";
  }
  ?>
</tbody>
    </table>
<?php include("../footer.php"); ?>