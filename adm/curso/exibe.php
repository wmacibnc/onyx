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
    
    
// Material por tipo
    $curso_id = $row2['curso_id'];

    $consulta = mysql_query("select * from upload where curso_id=".$curso_id." AND aula=1");


    while ($resultado2 = mysql_fetch_array($consulta)) {
      $tipo = $resultado2['tipo'];
      $arquivo = $resultado2['caminho'];

  // Livros e Artigos
      switch ($tipo) {
        case '1':
        echo "<div id='sombra_curso'>";
        echo "<img src='../imagens/icone/pdf.png' /> <br />";
        echo '<a href="javascript:void(0)" onclick="document.getElementById(&#39;white_content&#39;).style.display=&#39;block&#39;;document.getElementById(&#39;black_overlay&#39;).style.display=&#39;block&#39;">';
        echo "curso/".$arquivo."";
        echo '</a></p>';
        echo '<div id="white_content" style="display: none;">';
        echo "<embed src='curso/".$arquivo."' width='850px' height='550px'/>";
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
        echo "curso/".$arquivo."";
        echo '</a></p>';
        echo '<div id="white_content" style="display: none;">';
        echo "<embed src='curso/".$arquivo."' width='850px' height='550px'/>";
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
    }

?>    
<p align="center"> Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include('../footer.php') ?>