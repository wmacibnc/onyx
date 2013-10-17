<?php
include("header.php");
include("config.php");
?>
<div id="conteudo">
	<br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br />
  <h3>Curso</h3>
  <?php 
  $resultado = mysql_query("select * from grupo_curso");
  while($grupo=mysql_fetch_array($resultado)){
   $grupo_id = $grupo['id'];
   echo '
   <div id="elemento'.$grupo['id'].'"><h4>'.$grupo['nome'].'</h4></div>  
   <div id="hiddenEl'.$grupo['id'].'" style="display:none">';
   $resultado2 = mysql_query("select * from curso where grupo_id = ".$grupo_id);
   while($curso=mysql_fetch_array($resultado2)){
    echo $curso['nome']."<br />";
    echo "<a href='tenho_duvidas.php?curso_id=".$curso['id']."'>Tenho Dúvidas</a><br />";
    echo "<a href='mais_informacoes.php?curso_id=".$curso['id']."'>Mais Informações</a><br />";
    echo "<a href='matricula.php?curso_id=".$curso['id']."'>Inscrever Agora</a><br />";
  }

  echo '<div id="fechar'.$grupo['id'].'">Fechar</div>  
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