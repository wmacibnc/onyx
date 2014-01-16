<?php
include("../../config.php");  
include("../header.php");  
?>

<?php
$id = $_POST['id'];
$res = mysql_query("select * from curso WHERE id='$id'");

$curso=mysql_fetch_array($res);

?>
  <div id="conteudo_curso">
    <h3>Altera&ccedil;&atilde;o de Curso</h3>
    
      <form method="post" action="curso/atualizar.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value=" <?php echo $curso['id']; ?>" />

      <label>Grupo - Curso: </label>
      <br />
      <select name="grupo_id" >
        <?php 
          $resultado = mysql_query("select * from grupo_curso");
            while($grupo_curso=mysql_fetch_array($resultado)){
        ?>
              <option 
                <?php 
                  if($curso["grupo_id"] == $grupo_curso["id"]){
                    echo "selected='selected'"; 
                  }
                ?> 
                value='<?php echo $grupo_curso['id'] ?>'>

                <?php echo $grupo_curso['nome']; ?>
              </option>
            <?php } ?>      
      </select>
      <br /><br />

      <label>Nome do Curso: </label> <br />
      <input type="text" name="nome" id="nome" value="<?php echo $curso['nome']; ?>" size="100"/>
      <br /><br />

      <label>Investimento: </label> <br />
      <input type="text" name="valor" id="valor" value="<?php echo $curso['valor']; ?>" size="100"/><br /><br />

      <label>Validade em Dias: </label> <br />
      <input type="text" name="validade" id="validade" value="<?php echo $curso['validade']; ?>" size="100"/>
      <br /><br />

      <label>Carga Hor&aacute;ria: </label> <br />
      <input type="text" name="carga_horaria" id="carga_horaria" value="<?php echo $curso['carga_horaria']; ?>" size="100"/>
      <br /><br />

      <?php if($curso['ativo'] == 1){ ?>
        <input type="checkbox" name="ativo" value="1" checked/> Ativo <br /><br />
      <?php } ?>      
  
      <?php if($curso['ativo'] == 0){ ?>
        <input type="checkbox" name="ativo" value="0"/> Ativo <br /><br />
      <?php } ?>

      <label>Conte&uacute;do Program&aacute;tico: </label> <br /><br />

        <textarea name="descricao" id="descricao">
          <?php echo $curso['descricao']; ?>
        </textarea>
      <br />

      <label>Objetivos do Curso: </label> <br /><br />
        <textarea name="ementa" id="ementa">
          <?php echo $curso['ementa']; ?>
        </textarea>
      <br />

      <label>Observa&ccedil;&atilde;o: </label> <br /><br />
      <textarea name="observacao" id="observacao">
          <?php echo $curso['observacao']; ?>
        </textarea>
      <br />

    <input name="Editar" type="submit" value="Editar" />
    </form>

  </div>

<?php include("../footer.php");  ?>