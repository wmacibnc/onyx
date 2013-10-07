<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

  <?php
// Listando os arquivos da aula
  
  $usuario_id = $_SESSION['UsuarioID'];
  $curso_id =$_GET['curso'];

// conferir
  $resultado = mysql_query("select * from modulo_usuario_curso where usuario_id=".$usuario_id." and curso_id=".$curso_id."");
  $row=mysql_fetch_array($resultado);
  $aula_atual = $row['aula_atual'];
// conferir



  $resultado2 = mysql_query("select * from curso where id=".$curso_id."");
  $row2 = mysql_fetch_array($resultado2);
  $aula_total = $row2['qtd_aula'];
  $validadeAula = $row2['validadeAula'];
  $path = $row2['nome_pasta']."/";
  $diretorio = dir($path);

  echo "<h3>Curso em ".$row2['nome']."</h3>";

 // Verifica se o curso está vencido.
  $hoje = date("d/m/Y");
  $data_atual = explode("/", $hoje);
  $dia_atual = $data_atual[0];
  $mes_atual = $data_atual[1];
  $ano_atual = $data_atual[2];

  $dias = $row2['validade'];


    // Se tipo
    // 1 - Por módulos - Data de vinculo = DataInicio Turma
    // 0 - Por Aula - Data de Vinculo = DataVinculo no curso
  $resultado3 = mysql_query("select * from turma_usuario where usuario_id=".$usuario_id."");
  $turma_usuario = mysql_fetch_array($resultado3);
  $turma_id = $turma_usuario['turma_id'];
  $resultado4 = mysql_query("select * from turma_curso where turma_id=".$turma_id."");

  $turma_curso = mysql_fetch_array($resultado4);

  $tipo = $row2['tipo'];
  $dataVinculo = date('d/m/Y'); 

  if($tipo==1){
    $dataVinculo = $turma_curso['dataInicio'];  
  }else{
    $dataVinculo = $row['dataVinculo']; 
  }

  $validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
  $data_validade = explode("/", $validade);
  $dia_validade = $data_validade[0];
  $mes_validade = $data_validade[1];
  $ano_validade = $data_validade[2];

//COMPARANDO

  if (($dia_atual > $dia_validade) and ($mes_atual >= $mes_validade) and ($ano_atual >= $ano_validade)) {
    $validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
    $inicio = strftime("%d/%m/%Y", strtotime($dataVinculo));

    echo "Curso vencido! <br />";
    echo "Inicio " . $inicio." <br />";
    echo "Validade " . $validade." <br />";
  }else{
// Verifica o tipo de Curso
    $tipo = $row2['tipo'];
    // 1 - Por módulo
    // 0 - Por aula
    if($tipo==0){


      $path2 = $row2['nome_pasta']."/1";
      $diretorio2 = dir($path2);


//listar arquivos     
$i=1;
  // Livros e Artigos => PDF - WORD - TXT - EPUB
  if($files = glob($path2."/*.{pdf,txt,doc,epub}",GLOB_BRACE)){
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
  if($files = glob($path2."/*.{swf}",GLOB_BRACE)){

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
  if($files = glob($path2."/*.{flv,avi,wmv,mpeg4,mp3,rm,3gp}",GLOB_BRACE)){

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
  if($files = glob($path2."/*.exe")){
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



      $diretorio -> close();

    }else{
      $porcetagem = 100;
      $hoje = date('Y/m/d');
      $diff =  strtotime($hoje) - strtotime($dataVinculo);
   //  24 horas * 60 Min * 60 seg = 86400
      $totalDias = ceil($diff/86400);

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
          if ((($arquivo*$validadeAula)-$validadeAula) < $totalDias) {

            echo "<td align='center'><a href='curso/conteudo.php?curso=".$row2['id']."&aula=".$arquivo."'><img src='../imagens/icone/pasta.png'/> Módulo ".$arquivo."</a></td>";
            if( $i%3 == 0 ) {
             echo "</tr><tr>";
           }
           $i++;
         }
       }
     }

     $diretorio -> close();
   }
 }
 ?>
</tr>
</table>
<p align="center"> Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include('../footer.php') ?>

