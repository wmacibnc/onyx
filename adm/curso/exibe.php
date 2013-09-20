<?php
include("../../config.php");
include("../header.php");

// Listando os arquivos da aula
   $path = "adm-curso-mod/";
   $diretorio = dir($path);
    
    echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";    
   while($arquivo = $diretorio -> read()){
   	if($arquivo != '.' && $arquivo !='..'){
      echo "<a href='".$path.$arquivo."'><img src='../../imagens/icone/pasta.png'/> Aula ".$arquivo."</a><br />";
  }}
   $diretorio -> close();
?>
