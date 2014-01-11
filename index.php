<?php include("header.php");  ?>
<div id="conteudo">

<div id="banner" align="center">
   
    <div class="slider">
        <ul class="bxslider">
          <li><img src="imagens/banner/banner1.png" /></li>
          <li><img src="imagens/banner/banner2.png" /></li>
          <li><img src="imagens/banner/banner3.png" /></li>
          <li><img src="imagens/banner/banner4.png" /></li>
          <li><img src="imagens/banner/banner5.png" /></li>
        </ul>
     </div>
    
  </div>
  
<div id="destaque">

  <div id="destaque_titulo">
    <img src="imagens/curso_online.png">
  </div>

    <div id="banner-rotativo1" align="center">
      <img src="imagens/curso/curso1.png">
    </div>
    <div id="banner-rotativo2" align="center">
      <img src="imagens/curso/curso2.png">
    </div>
    <div id="banner-rotativo3" align="center">
      <img src="imagens/curso/curso3.png">
    </div>
    <div id="banner-rotativo4" align="center">
      <img src="imagens/curso/curso4.png">
    </div>

</div>

<!-- Fechamento da Div Conteúdo -->
</div>

<!-- Fechamento da Div Centro -->
</div>

<div id="titulo-areas">
  <div id="centro">
    <p class="titulo-areas">Conheça todas as áreas que você poderar aprender</p>
  </div>
</div>

<div id="centro">
<div id="conteudo">

   <?php 
  include ("config.php");
  $consulta = mysql_query("select * from grupo_curso order by nome");

  $i=1; 
  echo "<table width='100%'><tr>";

  while($grupo_curso = mysql_fetch_array($consulta)){

    echo "<td><div id='grupo_curso'><a href='grupo_curso.php?id=".$grupo_curso['id']."' class='grupo_curso'><label><img src='imagens/icone/grupo_curso.png'>".$grupo_curso['nome']."</label></a></div></td>";
    if( $i%4 == 0 ) {
     echo "</tr><tr>";
   }
   $i++;

 }
 ?>

</tr>
</table>


  <div id="box" align="center">
 <div id="box_1" align="center">
  <a href="#"><img src="imagens/box/box1.png"/></a>
</div>

<div id="box_2" align="center">
  <a href="#"><img src="imagens/box/box2.png"/></a>
</div>

<div id="box_3" align="center">
  <a href="#"><img src="imagens/box/box3.png"/></a>
</div>

<div id="box_4" align="center">
  <br />
  <a href="curso.php"><img src="imagens/box/box4_1.png"/></a>
  <br /><br />
  <a href="curso.php"><img src="imagens/box/box4_2.png"/></a>
</div>
</div>

 <div id="box2" align="center">
 <div id="box_5" align="center">
  <a href="#"><img src="imagens/box/box5.png"/></a>
</div>

<div id="box_6" align="center">
  <a href="#"><img src="imagens/box/box6.png"/></a>
</div>

<div id="box_7" align="center">
  <form action="verifica_certificado.php" method="POST">
    <div class="verificar_certificado">
    <input type="text" name="certificado" class="input_certificado"/>
    <br />
    <input type="image" name="imagem"src="imagens/icone/btn_verificar.png" alt="Buscar curso" class="btn-pesquisar" align="center" />
  </div>
  </div>
  </form>
</div>

<div id="box_8" align="center">
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

</div>

<div id="pagseguro" align="center">
  <br /><br /><br />
  <center>
    <a href='https://pagseguro.uol.com.br' target='_blank'><img alt='Logotipos de meios de pagamento do PagSeguro' src='imagens/banner-pagseguro.png' title='Este site aceita pagamentos com Visa, MasterCard, Diners, American Express, Hipercard, Aura, Elo, PLENOCard, PersonalCard, BrasilCard, FORTBRASIL, Cabal, Mais!, Avista, Grandcard, Bradesco, Itaú, Banco do Brasil, Banrisul, Banco HSBC, saldo em conta PagSeguro e boleto.' border='0'></a>
  </center>
  </div>


<div id="facebook">
  <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Finstitutoonyx&amp;width=900&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:980px; height:220px;" allowTransparency="true"></iframe>
  </div>
</div>

<?php include("footer.php") ?>