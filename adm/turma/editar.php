<?php
include("../../config.php");  
include("../header.php");  
?>

<?php

$id = $_POST['id'];
echo "<div id='conteudo_curso'>";

echo "<h3>Altera&ccedil;&atilde;o de Turma</h3>";

$res = mysql_query("select * from turma WHERE id='$id'"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
while($turma=mysql_fetch_array($res)){


  /*Escreve cada linha da tabela*/
  echo 
  
  '    
  <form method="post" action="turma/atualizar.php" enctype="multipart/form-data">
  <input type="hidden" name="id" value="'. $turma['id'].'" /> <br />

 <label>Nome: </label>   <br />
 <input type="text" name="nome" id="nome" value="'. $turma['nome'].'"/><br/><br />

 <label>Capacidade de Alunos: </label>   <br />
 <input type="text" name="quantidade" id="quantidade" value="'. $turma['quantidade'].'"/><br/><br />
 
</tr>'; 

?>

<tr>
 <td></td>
 <td><input name="Editar" type="submit" value="Editar" /></td>
</tr>
</table>  
<?php	
} 
?>
</form>
<p align="center">Instituto Onyx - Todos os direitos reservados</p>
</div>
<?php include("../footer.php");  ?>