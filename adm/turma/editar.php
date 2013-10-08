<?php
include("../../config.php");  
include("../header.php");  
?>

<?php

$id = $_POST['id'];
echo "<div id='conteudo_curso'>";

echo "<h3>Altera&ccedil;&atilde;o de Turma</h3>";

$res = mysql_query("select * from turma WHERE id='$id'"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
while($turma=mysql_fetch_array($res)){


	/*Escreve cada linha da tabela*/
	echo 

	'    
	<form method="post" action="turma/atualizar.php" enctype="multipart/form-data">
	<input type="hidden" name="id" value="'. $turma['id'].'" /> <br />

	<br />
	<label>Nome da Turma </label> <br />		
	<input type="text" name="nome" id="nome" maxlength="200" size="100" value="'.$turma['nome'].'"/>

	<br />
	<label>Descri&ccedil;&atilde;o da Turma</label><br />
	<input type="text" name="descricao" id="descricao" size="100" value="'.$turma['descricao'].'"/>

	<br />
	<label>Ementa da Turma</label><br />
	<input type="text" name="ementa" id="ementa" size="100" value="'.$turma['ementa'].'"/><br/>	
	<br />

	<table>
	<tr>
	<td width="30%"><label>Capacidade de Alunos </label> <br />		
	<input type="text" name="quantidade" id="quantidade" maxlength="10" value="'.$turma['quantidade'].'"/></td>
	<td width="30%"><label>Data de Inicio da Turma</label><br />
	<input type="text" name="dataInicio" id="dataInicio" maxlength="10" value="'.$turma['dataInicio'].'"/></td>
	<td width="30%"><label>Valor R$</label><br />
	<input type="text" name="valor" id="valor" value="'.$turma['valor'].'"/></td>
	</tr>
	</table>

	<br />
	<label>Observa&ccedil;&atilde;o</label><br />
	<textarea name="observacao" cols="75">
	'.$turma['observacao'].'
	</textarea>
	<br/>	

	<table>
	<tr>
	<td width="30%"><label>Nome da Pasta</label><br />
	<input type="text" name="nome_pasta" id="nome_pasta" maxlength="200" value="'.$turma['nome_pasta'].'"/></td>
	<td width="30%"><label>Quant. M&oacute;dulos</label><br />
	<input type="text" name="qtd_mod" id="qtd_mod" maxlength="10" value="'.$turma['qtd_mod'].'"/></td>
	<td width="30%"><label>Validade da Turma</label><br />
	<input type="text" name="validade" id="validade" maxlength="10" value="'.$turma['validade'].'"/></td>
	</tr>
	</table>
	<br />

	<label>Validade de cada M&oacute;dulo da Turma</label><br />
	<input type="text" name="validadeModulo" id="validadeModulo" maxlength="10" value="'.$turma['validadeModulo'].'"/><br/>	

	<br />

	<input type="checkbox" name="ativo" value="1" checked/> Ativo

	<br /><br />

	<input type="submit" value="Editar" />
	<input type="reset" value="Limpar" />
	</form> 

	'; 

	?>

<?php	
} 
?>
</form>
<p align="center">Instituto Onyx - Todos os direitos reservados</p>
</div>
<?php include("../footer.php");  ?>