<?php
	session_start();
	include_once "../../config.php";
	
	$acao = 'inserir';//$_POST['acao'];
	
	switch($acao){
		case 'inserir':
			$para = $_POST['para'];
			$mensagem = strip_tags($_POST['mensagem']);
			$id_usuario = $_SESSION['id_user'];
			$pegar_nome = mysql_query("SELECT nome FROM `usuario` WHERE id = ".$id_usuario."");			
			$resultado = mysql_fetch_array($pegar_nome);
			$ft = $resultado['nome'];
			
			$query = <<<QUERY
				INSERT INTO mensagens(id_de, id_para, data, mensagem) 
					VALUES ('$id_usuario', '$para',NOW(),'$mensagem')   
QUERY;
			mysql_query($query) or die ('ERRO: '.mysql_error());

			echo '<li><span>'.$ft.' disse:</span><p>'.$mensagem.'</p></li>';
			
			
		break;	
		
	}
?>