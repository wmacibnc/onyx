<?php
include("../../config.php");
include("../header.php");
?>
<div id="conteudo_curso">

  <?php
// Listando os arquivos da aula
  
  $usuario_id = $_SESSION['UsuarioID'];
  $turma_id =$_GET['turma'];

  $resultado = mysql_query("select * from turma t left join turma_usuario tu on t.id = tu.usuario_id where t.id=".$turma_id."");

  $row = mysql_fetch_array($resultado);

  $aula_total = $row['qtd_mod'];
  $aula_atual = $row['aula_atual'];
  $validadeAula = $row['validadeModulo'];
  $path = $row['nome_pasta']."/";
  $diretorio = dir($path);

  echo "<h3>Turma em ".$row['nome']."</h3>";

 // Verifica se o turma está vencido.
  $hoje = date("d/m/Y");
  $data_atual = explode("/", $hoje);
  $dia_atual = $data_atual[0];
  $mes_atual = $data_atual[1];
  $ano_atual = $data_atual[2];

  $dias = $row['validade'];


  $dataVinculo = date('d/m/Y'); 
  $dataVinculo = $row['dataInicio']; 

  $validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
  $data_validade = explode("/", $validade);
  $dia_validade = $data_validade[0];
  $mes_validade = $data_validade[1];
  $ano_validade = $data_validade[2];

//COMPARANDO
    $validade = date('d/m/Y', strtotime("+".$dias." days",strtotime($dataVinculo)));
    $inicio = strftime("%d/%m/%Y", strtotime($dataVinculo));

  if (($dia_atual > $dia_validade) and ($mes_atual >= $mes_validade) and ($ano_atual >= $ano_validade)) {
    echo "Curso Expirado (Turma)! <br />";
    echo "Inicio " . $inicio." <br />";
    echo "Validade " . $validade." <br />";
    }else{
      echo "Início: ". $inicio ." Valido até ".$validade."<br /><br />";
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

            echo "<td align='center'><a href='turma/conteudo.php?turma=".$turma_id."&aula=".$arquivo."'><img src='../imagens/icone/pasta.png'/> Módulo ".$arquivo."</a></td>";
            if( $i%3 == 0 ) {
             echo "</tr><tr>";
           }
           $i++;
         }
       }
     }

     $diretorio -> close();
   }

 ?>
</tr>
</table>
<p align="center"> Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include('../footer.php') ?>