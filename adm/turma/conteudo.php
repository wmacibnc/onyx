<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

<?php   

	$turma_id =$_GET['turma'];
	$usuario_id=$_SESSION['UsuarioID'];;
	$aula_id = $_GET['aula'];

  // Verifica se a aula atual é maior 
  $consulta = mysql_query("select * from turma_usuario where usuario_id=".$usuario_id." and turma_id=".$turma_id."");
  mysql_num_rows($consulta);
  $row=mysql_fetch_array($consulta);
  $aula_atual = $row['aula_atual'];
  $id = $row['id'];

    if($aula_atual<$aula_id){
      $query = mysql_query("UPDATE turma_usuario SET aula_atual='$aula_id' WHERE id='$id' ") or die(mysql_error());
    }


	  $resultado = mysql_query("select * from turma where id=".$turma_id."");
    $row = mysql_fetch_array($resultado);
    $path = $row['nome_pasta']."/".$aula_id."/";
    $porcetagem = 100;
    $aula_total = $row['qtd_mod'];
    $aula_atual;
    echo "<h3>Turma: ".$row['nome']."</h3>";

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
  echo "</div>";

  echo "<h4>Aula: ".$aula_id."</h4>";
  echo "<h4>Conteúdo </h4>";

  $diretorio = dir($path);
  $aula;
  $consulta = mysql_query("select * from upload where turma_id=".$turma_id." AND aula=".$aula_id."");


    while ($resultado2 = mysql_fetch_array($consulta)) {
      $tipo = $resultado2['tipo'];
      $arquivo = $resultado2['caminho'];

  // Livros e Artigos
      switch ($tipo) {
        case '1':
        echo "<div id='sombra_curso'>";
        echo "<img src='../imagens/icone/pdf.png' /> <br />";
        echo '<a href="javascript:void(0)" onclick="document.getElementById(&#39;white_content&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;black_overlay&#39;).style.display=&#39;block&#39;">';
        echo "turma/".$arquivo."";
        echo '</a></p>';
        echo '<div id="white_content" style="display: none;">';
        echo "<embed src='turma/".$arquivo."' width='850px' height='550px'/>";
        echo '<br>Para fechar, <a href="javascript:void(0)" onclick="document.getElementById(&#39;white_content&#39;).style.display=&#39;none&#39;;document.getElementById(&#39;black_overlay&#39;).style.display=&#39;none&#39;">clique aqui</a>.</div>';
        echo '<div id="black_overlay" style="display: none;"></div>';
        echo "</div>";
        break;

        case '2':
      
        break;

        case '3':
      echo "<div id='sombra_curso'>";
        echo "<img src='../imagens/icone/txt.png' /> <br />";
        echo '<a href="javascript:void(0)" onclick="document.getElementById(&#39;white_content&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;black_overlay&#39;).style.display=&#39;block&#39;">';
        echo "turma/".$arquivo."";
        echo '</a></p>';
        echo '<div id="white_content" style="display: none;">';
        echo "<embed src='turma/".$arquivo."' width='850px' height='550px'/>";
        echo '<br>Para fechar, <a href="javascript:void(0)" onclick="document.getElementById(&#39;white_content&#39;).style.display=&#39;none&#39;;document.getElementById(&#39;black_overlay&#39;).style.display=&#39;none&#39;">clique aqui</a>.</div>';
        echo '<div id="black_overlay" style="display: none;"></div>';
        echo "</div>";
        break;

        case '4':
      
        break;

        default:
      
        break;
      }
      }
    


?>
   <p align="center">Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include("../footer.php"); ?>