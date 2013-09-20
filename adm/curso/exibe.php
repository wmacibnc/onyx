<?php
include("../../config.php");
include("../header.php");

// Listando os arquivos da aula
   $path = "adm-curso-mod/";
   $diretorio = dir($path);
    
    echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";    

    	$resultado = mysql_query("select * from modulo_usuario_curso where usuario_id=1 and curso_id=1");
    	$row=mysql_fetch_array($resultado);
    	$aula_atual = $row['aula_atual'];

    	$resultado2 = mysql_query("select * from curso where id=1");
    	$row2 = mysql_fetch_array($resultado2);
    	$aula_total = $row2['qtd_aula'];

    	$porcetagem = 100;

    	$aula = ($aula_atual*($porcetagem)) / ($aula_total);
    	echo "<br /> Aula Atual: " . $aula_atual;
		echo "<br /> Total de Aula:  " . $aula_total;
		echo "<br /> Porcentagem: ".$aula;

    	echo "<div id='progressbar' style='width:".$aula."%;'>teste</div>";
   while($arquivo = $diretorio -> read()){
   	if($arquivo != '.' && $arquivo !='..'){
      echo "<a href='".$path.$arquivo."'><img src='../../imagens/icone/pasta.png'/> Aula ".$arquivo."</a><br />";
  }}
   $diretorio -> close();
?>

