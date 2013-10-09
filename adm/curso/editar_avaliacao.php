<?php
include("../../config.php");  
include("../header.php");  
?>

<?php

echo $id = $_POST['id'];
echo "<div id='conteudo_curso'>";

echo "<h3>Altera&ccedil;&atilde;o de Pergunta</h3>";

$res = mysql_query("select * from questionario WHERE id='".$id."'"); 

while($questionario=mysql_fetch_array($res)){

	/*Escreve cada linha da tabela*/
	echo 

	'    
	<form method="post" action="curso/atualizar_avaliacao.php" enctype="multipart/form-data">
	<input type="hidden" name="id" value="'. $questionario['id'].'" /> <br />
	<input type="hidden" name="curso_id" value="'. $questionario['curso_id'].'" /> <br />

	<label>Pergunta</label> <br />		
	<input type="text" name="pergunta" id="pergunta" maxlength="255" size="100" value="'.$questionario['pergunta'].'"/>

	<br /><br />
	<label>Resposta - 01</label> <br />		
	<input type="text" name="resposta1" id="resposta1" maxlength="255" size="100" value="'.$questionario['resposta1'].'"/>

	<br /><br />
	<label>Resposta - 02</label> <br />		
	<input type="text" name="resposta2" id="resposta2" maxlength="255" size="100" value="'.$questionario['resposta2'].'"/>

	<br /><br />
	<label>Resposta - 03</label> <br />		
	<input type="text" name="resposta3" id="resposta3" maxlength="255" size="100" value="'.$questionario['resposta3'].'"/>

	<br /><br />
	<label>Resposta - 04</label> <br />		
	<input type="text" name="resposta4" id="resposta4" maxlength="255" size="100" value="'.$questionario['resposta4'].'"/>

	<br /><br />
	<label>Resposta Correta</label> <br />		
	<input type="text" name="respostaCorreta" id="respostaCorreta" maxlength="255" size="5" value="'.$questionario['respostaCorreta'].'"/>

	<br /><br />

	<input type="submit" value="Editar" />
	<input type="reset" value="Limpar" />
	</form> 

	'; 	
} 
?>
</form>
<p align="center">Instituto Onyx - Todos os direitos reservados</p>
</div>
<?php include("../footer.php");  ?>