<?php include("header.php");  ?>
<div id="conteudo">

<!-- <div id="destaque">
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
</div> -->

 <div id="box_esquerda" align="center">
  <a href="contato.php"><img src="imagens/box/box1.png"/></a>
</div>
<div id="box_central" align="center">
  <a href="adm/index.php"><img src="imagens/box/box2.png"/></a>
</div>
<div id="box_direita" align="center">
  <a href="matricula.php"><img src="imagens/box/box3.png"/></a>
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

    echo "<td><div id='grupo_curso'><a href='grupo_curso.php?id=".$grupo_curso['id']."' class='grupo_curso'><label>".$grupo_curso['nome']."</label></a></div></td>";
    if( $i%4 == 0 ) {
     echo "</tr><tr>";
   }
   $i++;

 }
 ?>

</tr>
</table>
</div>
<div id="pagseguro" align="center">
  <br /><br /><br />
  <center>
    <a href='https://pagseguro.uol.com.br' target='_blank'><img alt='Logotipos de meios de pagamento do PagSeguro' src='imagens/banner-pagseguro.png' title='Este site aceita pagamentos com Visa, MasterCard, Diners, American Express, Hipercard, Aura, Elo, PLENOCard, PersonalCard, BrasilCard, FORTBRASIL, Cabal, Mais!, Avista, Grandcard, Bradesco, Itaú, Banco do Brasil, Banrisul, Banco HSBC, saldo em conta PagSeguro e boleto.' border='0'></a>
  </center>
  </div>

<div id="recomenda">
  <?php 
  $resultado = mysql_query("select * from comentario where ativo=1 ORDER BY RAND() LIMIT 1");
  $consulta = mysql_fetch_array($resultado);
  echo "<div id='texto-recomenda'>";
  echo "<p>".$consulta['texto']."</p>";
  echo "<p>".$consulta['nome']."</p>";
  echo "<p>".$consulta['cidade']."</p>";
  echo "</div>"
  ?>
</div>

<div id="verificar_certificado">
  <div id="texto-verificar" align="center">
  <form action="verifica_certificado.php" method="POST">
    <div class="verificar_certificado">
    <label>Código </label>
    <input type="text" name="certificado" />
    <input type="image" name="imagem"src="imagens/icone/pesquisar.jpg" alt="Buscar curso" class="btn-curso" align="botton" />
  </div>
  </div>
  </form>
</div>
</div>

<div id="facebook">
  <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Finstitutoonyx&amp;width=900&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:900px; height:220px;" allowTransparency="true"></iframe>
  </div>
</div>

<?php include("footer.php") ?>