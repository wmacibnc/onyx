<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">
 
  <?php

  $turma_id = $_GET['turma'];

  $res = mysql_query("select * from turma where id=".$turma_id.""); 
  $turma=mysql_fetch_array($res);
  echo "<h3>Dados da turma em ".$turma['nome']."</h3>";
  
  $path = $turma['nome_pasta']."/";
  $diretorio = dir($path);

  $i=1; 
  echo "<table width='100%'><tr>";
  while($arquivo = $diretorio -> read()){
    if($arquivo != '.' && $arquivo !='..'){
      
      echo "<td><a href='turma/adiciona_conteudo.php?turma=".$turma['nome_pasta']."&aula=".$arquivo."&turma_id=".$turma['id']."&turma_nome=".$turma['nome']."'>Aula ".$arquivo."</a></td>";
      if( $i%3 == 0 ) {
       echo "</tr><tr>";
     }
     $i++;
   }
 }

 $diretorio -> close();

  while($turma=mysql_fetch_array($res)){

   echo "
    <a href='adiciona_conteudo.php?turma=".$turma_id."&aula=1'></a>
    </td>

   </tr>
    ";
  }
  ?>
</tbody>
    </table>
    <p align='center'>Todos os direitos reservados - Instituto Onyx 2013</p>
<?php include("../footer.php"); ?>