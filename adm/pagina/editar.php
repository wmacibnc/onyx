<?php
include("../../config.php");  
include("../header.php");  
?>
<div id="conteudo_curso">
  <?php

  $id = $_POST['id'];


  $res = mysql_query("select * from paginas WHERE id='$id'"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  $pagina=mysql_fetch_array($res);


  /*Escreve cada linha da tabela*/
  echo   
  '    
  <form method="post" action="pagina/atualizar.php" enctype="multipart/form-data">
  <input type="hidden" name="id" value= "'. $pagina['id'].'" />';

  echo "<h3>Atualizar P&aacute;gina <br /><br />".$pagina['nomePagina']."</h3>";

  echo '<br />
  <textarea name="conteudo">'.$pagina['conteudo'].'</textarea>'; 

  ?>

  <input name="Editar" type="submit" value="Editar" />


</form>
<?php include("../footer.php");  ?>