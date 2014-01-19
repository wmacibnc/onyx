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

    


    $pagina = basename($_SERVER['REQUEST_URI']);
    $contador = 0;

    // Aulas Virtuais = 1
    // Livros Artigos = 2
    // Arquivos Textos= 3
    // Vídeos         = 4
    // Donwloads      = 5

    // Aulas Virtuais = 1
    $consulta_1 = mysql_query("select * from upload where curso_id=".$curso_id." AND aula=1 AND tipo=1");
    if(mysql_num_rows($consulta_1) >=1){
        echo "<div id='sombra_curso'>";
        echo "<img src='../imagens/icone/apresentacao.png' /> <br /><br />";
          while ($aulasVirtuais = mysql_fetch_array($consulta_1)) {
            $contador ++;
            $arquivo = $aulasVirtuais['caminho'];

            echo '<div id="divThumbnails">
                <a href="curso/'.$pagina.'#divModalDialog'.$contador.'"> Aula '.$contador.'</a>
                  </div>

                  <div id="divModalDialog'.$contador.'" class="divModalDialog">
                    <div> 
                      <embed src="curso/'.$arquivo.'"width="80%" height="550px" /> <br />
                      <a href=curso/'.$pagina.' class="clique_aqui">Clique aqui para fechar.</a> 
                    </div>
                  </div>';
          }
    echo "<br />";
    echo "</div>";
  }

    // Livros Artigos = 2
    $consulta_2 = mysql_query("select * from upload where curso_id=".$curso_id." AND aula=1 AND tipo=2");
    if(mysql_num_rows($consulta_2) >=1){
        echo "<div id='sombra_curso'>";
        echo "<img src='../imagens/icone/pdf.png' /> <br /><br />";
          while ($artigos = mysql_fetch_array($consulta_2)) {
            $contador ++;
            $arquivo = $artigos['caminho'];

            echo '<div id="divThumbnails">
                <a href="curso/'.$pagina.'#divModalDialog'.$contador.'"> Aula '.$contador.'</a>
                  </div>

                  <div id="divModalDialog'.$contador.'" class="divModalDialog">
                    <div> 
                      <embed src="curso/'.$arquivo.'"width="80%" height="550px" /> <br />
                      <a href=curso/'.$pagina.' class="clique_aqui">Clique aqui para fechar.</a> 
                    </div>
                  </div>';
          }
    echo "<br />";
    echo "</div>";
  }

    // Arquivos Textos= 3
    $consulta_3 = mysql_query("select * from upload where curso_id=".$curso_id." AND aula=1 AND tipo=3");
    if(mysql_num_rows($consulta_3) >=1){
        echo "<div id='sombra_curso'>";
        echo "<img src='../imagens/icone/txt.png' /> <br /><br />";
          while ($arquivosTextos = mysql_fetch_array($consulta_3)) {
            $contador ++;
            $arquivo = $arquivosTextos['caminho'];

            echo '<div id="divThumbnails">
                <a href="curso/'.$pagina.'#divModalDialog'.$contador.'"> Aula '.$contador.'</a>
                  </div>

                  <div id="divModalDialog'.$contador.'" class="divModalDialog">
                    <div> 
                      <embed src="curso/'.$arquivo.'"width="80%" height="550px" /> <br />
                      <a href=curso/'.$pagina.' class="clique_aqui">Clique aqui para fechar.</a> 
                    </div>
                  </div>';
          }
    echo "<br />";
    echo "</div>";
  }
    // Vídeos         = 4
    $consulta_4 = mysql_query("select * from upload where curso_id=".$curso_id." AND aula=1 AND tipo=4");
    if(mysql_num_rows($consulta_4) >=1){
        echo "<div id='sombra_curso'>";
        echo "<img src='../imagens/icone/video.png' /> <br /><br />";
          while ($videos = mysql_fetch_array($consulta_4)) {
            $contador ++;
            $arquivo = $videos['caminho'];

            echo '<div id="divThumbnails">
                <a href="curso/'.$pagina.'#divModalDialog'.$contador.'"> Aula '.$contador.'</a>
                  </div>

                  <div id="divModalDialog'.$contador.'" class="divModalDialog">
                    <div> 
                      <embed src="curso/'.$arquivo.'"width="80%" height="550px" /> <br />
                      <a href=curso/'.$pagina.' class="clique_aqui">Clique aqui para fechar.</a> 
                    </div>
                  </div>';
          }
    echo "<br />";
    echo "</div>";
  }

    // Donwloads      = 5
    $consulta_5 = mysql_query("select * from upload where curso_id=".$curso_id." AND aula=1 AND tipo=5");
    if(mysql_num_rows($consulta_5) >=1){
        echo "<div id='sombra_curso'>";
        echo "<img src='../imagens/icone/outros.png' /> <br /><br />";
          while ($donwloads = mysql_fetch_array($consulta_5)) {
            $contador ++;
            $arquivo = $donwloads['caminho'];
            echo "<a href='curso/donwload.php?arquivo=".$arquivo."'> Aula ".$contador."</a> <br />";
          }
        echo "<br />";
        echo "</div>";


    }
    }

?>    
<p align="center"> Todos os direitos reservados - Instituto Onyx 2013</p>
</div>
<?php include('../footer.php') ?>