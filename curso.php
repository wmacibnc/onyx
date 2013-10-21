<?php
include("header.php");
include("config.php");
?>
<div id="conteudo">
  <div id="imagem" align="center">
    <img src="imagens/banner-curso.png">
  </div>
  <?php 
  $resultado = mysql_query("select * from grupo_curso");
  while($grupo=mysql_fetch_array($resultado)){
   $grupo_id = $grupo['id'];
   echo "<div id='nome_curso'>";
   echo '
   <div id="elemento'.$grupo['id'].'"><h4>'.$grupo['nome'].'</h4></div>
   </div>
   <div id="hiddenEl'.$grupo['id'].'" style="display:none">';
   $resultado2 = mysql_query("select * from curso where grupo_id = ".$grupo_id);
   while($curso=mysql_fetch_array($resultado2)){
    echo "<label><font size='5px' color='#1D1D1D'>".$curso['nome']."</font></label>";
    echo "<a href='tenho_duvidas.php?curso_id=".$curso['id']."'><img hspace='20px'src='imagens/icone/tenho-duvidas.png'/></a>";
    echo "<a href='mais_informacoes.php?curso_id=".$curso['id']."'><img hspace='20px'src='imagens/icone/ementa.png'/></a>";
    echo "<a href='matricula.php?curso_id=".$curso['id']."'><img hspace='20px'src='imagens/icone/inscrever.png'/></a></a>";
  }

  echo '<div id="fechar'.$grupo['id'].'"><img src="imagens/icone/seta_para_cima.png"></div>  
  </div>  
  <script>  
  function showElement'.$grupo['id'].'() {  
    document.getElementById("hiddenEl'.$grupo['id'].'").style.display = "block";  
  }  
  function hideElement'.$grupo['id'].'() {  
    document.getElementById("hiddenEl'.$grupo['id'].'").style.display = "none";  
  }  
  document.getElementById("elemento'.$grupo['id'].'").addEventListener("mouseover", showElement'.$grupo['id'].', false);  
  document.getElementById("fechar'.$grupo['id'].'").addEventListener("mouseover", hideElement'.$grupo['id'].', false);  
  </script> ';
}
?>

</div>
<?php include("footer.php");  ?>