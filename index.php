<?php include("header.php");  ?>
<div id="conteudo">
					<div id="box_esquerda" align="center">
						<a href="contato.php"><img src="imagens/box/box1.png"/></a>
					</div>
					<div id="box_central" align="center">
						<a href="adm/index.php"><img src="imagens/box/box2.png"/></a>
					</div>
					<div id="box_direita" align="center">
						<a href="matricula.php"><img src="imagens/box/box3.png"/></a>
					</div>




					<div id="destaque">
    <div id="destaque_titulo">
      <h2 class="titulo_destaque">Faça agora um curso Online Grátis<h2>
      </div>
      <div id="banner-rotativo">
        <div id="wrap">
         <ul id="mycarousel" class="jcarousel-skin-tango">
          <li><a href="#"><img src="imagens/curso/curso1.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso2.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso3.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso4.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso5.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso1.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso2.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso3.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso4.png" width="100" height="70" alt="" /></a></li>
          <li><a href="#"><img src="imagens/curso/curso5.png" width="100" height="70" alt="" /></a></li>
        </ul>
      </div>
    </div>
  </div>
  
<div id="titulo-areas">
  <p class="titulo-areas">Conheça todas as áreas que você poderá aprender</p>
</div>
<div id="conteudo">
  <?php 
  include ("config.php");
  $consulta = mysql_query("select * from grupo_curso");

  $i=1; 
  echo "<table width='100%'><tr>";

  while($grupo_curso = mysql_fetch_array($consulta)){
    echo "<td align='center'>".$grupo_curso['nome']."</td>";
    if( $i%4 == 0 ) {
     echo "</tr><tr>";
   }
   $i++;
 }
 ?>

</tr>
</table>
</div>
				</div>
<?php include("footer.php") ?>