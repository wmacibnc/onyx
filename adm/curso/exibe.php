<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">
  <?php
// Listando os arquivos da aula
  
  $usuario_id = 1;
  $curso_id =$_GET['curso'];


  $resultado = mysql_query("select * from modulo_usuario_curso where usuario_id=".$usuario_id." and curso_id=".$curso_id."");
  $row=mysql_fetch_array($resultado);
  $aula_atual = $row['aula_atual'];

  $resultado2 = mysql_query("select * from curso where id=".$curso_id."");
  $row2 = mysql_fetch_array($resultado2);
  $aula_total = $row2['qtd_aula'];
  $path = $row2['nome_pasta']."/";
  $diretorio = dir($path);

  echo "<h3>Curso em ".$row2['nome']."</h3>";

  $porcetagem = 100;

  $aula = ($aula_atual*($porcetagem)) / ($aula_total);
  echo "<div id='direita' align='right'>";
  echo "<h4 class='aqui'>Você está aqui!</h4>";
  echo "<div id='progressbar_box' align='left'>&nbsp;".number_format($aula, 2, ',', '')." % concluído.";
  echo "<div id='progressbar100' style='width=100%'>";
  echo "
  <div id='progressbar' style='width:".$aula."%;'> &nbsp;
  </div>";
  echo "</div>";
  echo "</div>";
  echo "</div> <br /><br />";

  $i=1; 
  echo "<table width='100%'><tr>";
  while($arquivo = $diretorio -> read()){
    if($arquivo != '.' && $arquivo !='..'){
      echo "<td align='center'><a href='conteudo.php?curso=".$row2['id']."&aula=".$arquivo."'><img src='../../imagens/icone/pasta.png'/> Aula ".$arquivo."</a></td>";
      if( $i%3 == 0 ) {
       echo "</tr><tr>";
     }
     $i++;
   }
 }

 $diretorio -> close();
 ?>
 </tr>
</table>
<p align="center"> Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include('../footer.php') ?>

