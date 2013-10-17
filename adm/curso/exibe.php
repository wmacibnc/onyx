<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

  <?php
// Listando os arquivos da aula
  
  $usuario_id = $_SESSION['UsuarioID'];
  $curso_id =$_GET['curso'];

  $resultado = mysql_query("select * from curso c left join usuario_curso uc on c.id = uc.curso_id where c.id=".$curso_id." AND uc.usuario_id=".$usuario_id);
  $row2 = mysql_fetch_array($resultado);

  echo "<h3>Curso em ".$row2['nome']."</h3>";

 // Verifica se o curso está vencido.
  $hoje = date("d/m/Y");
  $data_atual = explode("/", $hoje);
  $dia_atual = $data_atual[0];
  $mes_atual = $data_atual[1];
  $ano_atual = $data_atual[2];

  $dias = $row2['validade'];

  $dataVinculo = date('d/m/Y'); 
  $dataVinculo = $row2['dataVinculo']; 

  $validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
  $data_validade = explode("/", $validade);
  $dia_validade = $data_validade[0];
  $mes_validade = $data_validade[1];
  $ano_validade = $data_validade[2];

//COMPARANDO
 $validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
    $inicio = strftime("%d/%m/%Y", strtotime($dataVinculo));
  if (($dia_atual > $dia_validade) and ($mes_atual >= $mes_validade) and ($ano_atual >= $ano_validade)) {
   

    echo "Curso expirado! <br />";
    echo "Inicio " . $inicio." <br />";
    echo "Validade " . $validade." <br />";
  }else{

  echo "Início: ". $inicio ." Valido até ".$validade."<br /><br />";
    
  $path = $row2['nome_pasta']."/";
  $diretorio = dir($path);


//listar arquivos     
$i=1;
  // Livros e Artigos => PDF - WORD - TXT - EPUB
  if($files = glob($path."/*.{pdf,txt,doc,epub,docx}",GLOB_BRACE)){
  //permorre a lista
  // PDF
     echo "<div id='sombra_curso'>";
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
      echo "</div>";
      }else{
}

    // Aulas => swf
  if($files = glob($path."/*.{swf}",GLOB_BRACE)){

  //permorre a lista
     echo "<div id='sombra_curso'>";
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
      echo "</div>";
      }else{
}


  // Videos => flv, avi, wmv, mpeg4, wma, MP3, RM, 3gp
  if($files = glob($path."/*.{flv,avi,wmv,mpeg4,mp3,rm,3gp}",GLOB_BRACE)){

  //permorre a lista
     echo "<div id='sombra_curso'>";
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
      echo "</div>";
      }else{
}




// EXE - Executabel
  if($files = glob($path."/*.exe")){
  //permorre a lista
  // PDF
     echo "<div id='sombra_curso'>";
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
      echo "</div>";
}else{
}



      $diretorio -> close();

 }
 ?>
</tr>
</table>
<p align="center"> Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include('../footer.php') ?>

