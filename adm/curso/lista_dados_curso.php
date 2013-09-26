<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">
 
  <?php

  $curso_id = $_GET['curso'];

  $res = mysql_query("select * from curso where id=".$curso_id.""); 
  $curso=mysql_fetch_array($res);
  echo "<h3>Dados do Curso em ".$curso['nome']."</h3>";
  
  $path = $curso['nome_pasta']."/";
  $diretorio = dir($path);

  $i=1; 
  echo "<table width='100%'><tr>";
  while($arquivo = $diretorio -> read()){
    if($arquivo != '.' && $arquivo !='..'){
      
      echo "<td><a href='curso/adiciona_conteudo.php?curso=".$curso['nome_pasta']."&aula=".$arquivo."&curso_id=".$curso['id']."&curso_nome=".$curso['nome']."'>Aula ".$arquivo."</a></td>";
      if( $i%3 == 0 ) {
       echo "</tr><tr>";
     }
     $i++;
   }
 }

 $diretorio -> close();

  while($curso=mysql_fetch_array($res)){

   echo "
    <a href='adiciona_conteudo.php?curso=".$curso_id."&aula=1'></a>
    </td>

   </tr>
    ";
  }
  ?>
</tbody>
    </table>
    <p align='center'>Todos os direitos reservados - Instituto Onyx 2013</p>
<?php include("../footer.php"); ?>