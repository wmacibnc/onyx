<?php include("header.php"); include("config.php"); ?>
<div id="conteudo">
	  <h1>Tenho Dúvidas</h1>
   <h4>Entre abaixo com seus dados para entrarmos em contato</h4>
   <form id="form1" name="form1" method="post" action="form.php">
    <?php 
    $curso_id = $_GET['curso_id'];
    $consulta = mysql_query("select * from curso where id = ".$curso_id);
    $resultado = mysql_fetch_array($consulta);
     ?>
      <input type="hidden" name="assunto" value="TENHO DÚVIDAS - Instituto Onyx - Curso <?php echo $resultado['nome']; ?>" />
      <table width="100%">
         <tr>
            <td><strong>Nome:</td>
            <td><label><input type="text" size="58" name="nome" id="nome" /></label></td>
        </tr>
        <tr>
            <td><strong>Email:</td>
            <td><label><input type="text" size="58" name="email" id="email" /></label></td>
        </tr>
        <tr>
            <td><strong>Telefone:</td>
            <td><label><input type="text" name="telefone" id="telefone" /></label></td>
        </tr>
        <tr>
            <td><strong>Mensagem:</td>
            <td><label><textarea name="mensagem" id="mensagem" cols="45" rows="5"></textarea></label></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Enviar Mensagem" /></td>
        </tr>
    </table>
</form>
</div>
<?php include("footer.php");  ?>