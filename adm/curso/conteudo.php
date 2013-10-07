<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

<?php   

	$curso_id =$_GET['curso'];
	$usuario_id=$_SESSION['UsuarioID'];;
	$aula_id = $_GET['aula'];

  // Verifica se a aula atual é maior 
  $consulta = mysql_query("select * from modulo_usuario_curso where usuario_id=".$usuario_id." and curso_id=".$curso_id."");
  $row=mysql_fetch_array($consulta);
  $aula_atual = $row['aula_atual'];
  $id = $row['id'];

if($aula_atual<$aula_id){
      $editar = "UPDATE `modulo_usuario_curso` SET 
      `aula_atual` = '".$aula_id."'
      WHERE (`id` = ".$id.")";

/* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
mysql_query($editar) or die ('ERRO: '.mysql_error());
}


	$resultado = mysql_query("select * from curso where id=".$curso_id."");
    $row = mysql_fetch_array($resultado);
    $path = $row['nome_pasta']."/".$aula_id."/";
    $porcetagem = 100;
    $aula_total = $row['qtd_aula'];

    echo "<h3>Curso: ".$row['nome']."</h3>";

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

//listar arquivos     
  $i=1;
  // Livros e Artigos => PDF - WORD - TXT - EPUB
  if($files = glob($path."/*.{pdf,txt,doc,epub}",GLOB_BRACE)){
  //permorre a lista
  // PDF
      echo "<img src='../imagens/icone/pdf.png' /> <br />";
      foreach($files as $file) {         
        $i++;
        if (!is_dir($file)){
          echo "<script> 
          function enviar_formulario".$i."(){ 
            document.forme".$i.".submit() 
          } 
          </script>";
          echo "<form method='POST' name='forme".$i."' action='curso/mostra.php'>";
          echo "<input type='hidden' name='arquivo' value='".$file."' />";
          echo '<a href="javascript:enviar_formulario'.$i.'();">'.basename($file).'</a>';
          echo "</form>";
        }
      }
      }else{
}

    // Aulas => swf
  if($files = glob($path."/*.{swf}",GLOB_BRACE)){

  //permorre a lista
      echo "<img src='../imagens/icone/apresentacao.png' /> <br />";
      foreach($files as $file) {         
        $i++;
        if (!is_dir($file)){
          echo "<script> 
          function enviar_formulario".$i."(){ 
            document.forme".$i.".submit() 
          } 
          </script>";
          echo "<form method='POST' name='forme".$i."' action='curso/mostra.php'>";
          echo "<input type='hidden' name='arquivo' value='".$file."' />";
          echo '<a href="javascript:enviar_formulario'.$i.'();">'.basename($file).'</a>';
          echo "</form>";
        }
      } 
      }else{
}


  // Videos => flv, avi, wmv, mpeg4, wma, MP3, RM, 3gp
  if($files = glob($path."/*.{flv,avi,wmv,mpeg4,mp3,rm,3gp}",GLOB_BRACE)){

  //permorre a lista
      echo "<img src='../imagens/icone/video.png' /> <br />";
      foreach($files as $file) {         
        $i++;
        if (!is_dir($file)){
          echo "<script> 
          function enviar_formulario".$i."(){ 
            document.forme".$i.".submit() 
          } 
          </script>";
          echo "<form method='POST' name='forme".$i."' action='curso/mostra.php'>";
          echo "<input type='hidden' name='arquivo' value='".$file."' />";
          echo '<a href="javascript:enviar_formulario'.$i.'();">'.basename($file).'</a>';
          echo "</form>";
        }
      } 
      }else{
}




// EXE - Executabel
  if($files = glob($path."/*.exe")){
  //permorre a lista
  // PDF
      echo "<img src='../imagens/icone/outros.png' /> <br />";
      foreach($files as $file) {         
        $i++;
        if (!is_dir($file)){
          echo "<script> 
          function enviar_formulario".$i."(){ 
            document.forme".$i.".submit() 
          } 
          </script>";
          echo "<form method='POST' name='forme".$i."' action='curso/mostra.php'>";
          echo "<input type='hidden' name='arquivo' value='".$file."' />";
          echo '<a href="javascript:enviar_formulario'.$i.'();">'.basename($file).'</a>';
          echo "</form>";
        }
      } 
}else{
}

   $diretorio -> close(); ?>
   <p align="center">Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include("../footer.php"); ?>