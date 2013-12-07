<?php 
include("config.php"); 
include("header.php"); 
?>
<div id="conteudo">
	<?php 
	$imagem = $_FILES["imagem"];
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];

	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$cep = $_POST['cep'];

	$ddtelefone = $_POST['dd'];
	$telefone = $_POST['telefone'];
	$ddcelular = $_POST['dd2'];
	$celular = $_POST['celular'];

	$pai = $_POST['pai'];
	$mae = $_POST['mae'];
	$sexo = $_POST['sexo'];
	// Ativo
	$ativo = 1;
	// 0 
	$nivel = 0;


// Se a imagem estiver sido selecionada 
	if (!empty($imagem["name"])) {   

// Largura máxima em pixels 
		$largura = 1000; 
// Altura máxima em pixels 
		$altura = 1000; 
// Tamanho máximo do arquivo em bytes 
		$tamanho = 5000000; 

		$error;
// Verifica se o arquivo é uma imagem 
		if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){ 
			$error[1] = "Isso não é uma imagem."; 
		}   
// Pega as dimensões da imagem 
		$dimensoes = getimagesize($imagem["tmp_name"]);   
// Verifica se a largura da imagem é maior que a largura permitida 
		if($dimensoes[0] > $largura) { 
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}   
 // Verifica se a altura da imagem é maior que a altura permitida 
		if($dimensoes[1] > $altura) { 
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}   
  // Verifica se o tamanho da imagem é maior que o tamanho permitido 
		if($imagem["size"] > $tamanho) { $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
	}   
   // Pega extensão da imagem 
	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);   
   // Gera um nome único para a imagem 
	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];   
   // Caminho de onde ficará a imagem 
	$caminho_imagem = "uploads/" . $nome_imagem;   
   // Faz o upload da imagem para seu respectivo caminho 
	move_uploaded_file($imagem["tmp_name"], $caminho_imagem);   

 // Insere os dados no banco 
	$query = <<<QUERY
	INSERT INTO usuario(
		login, 
		senha,
		nome, 
		email, 
		cpf,
		rg,
		endereco,
		numero,
		complemento,
		bairro,
		cidade,
		uf,
		cep,
		ddtelefone,
		ddcelular,
		telefone,
		celular,
		pai,
		mae,
		sexo,
		ativo,
		nivel,
		imagem
		)
VALUES (
	'$email', 
	'$senha',
	'$nome',
	'$email', 
	'$cpf',
	'$rg',
	'$endereco',
	'$numero',
	'$complemento',
	'$bairro',
	'$cidade',
	'$uf',
	'$cep',
	'$ddtelefone',
	'$ddcelular',
	'$telefone',
	'$celular',
	'$pai',
	'$mae',
	'$sexo',
	'$ativo',
	'$nivel',
	'$nome_imagem'
	)
QUERY;
if(mysql_query($query)){
	$nao_continuar = 0;
}else{
	$nao_continuar = 1;
	echo 'ERRO: '.mysql_error();
} 

   // Se os dados forem inseridos com sucesso 
if ($nao_continuar == 0 or $erro!=null){ 
	echo "<h3>Dados cadastrados com sucesso!</h3>". "<br />";
	echo "<a href='matricula.php'>Continue sua matricula</a>";
}else{
	echo "<h3>Aconteceu um erro no processamento!</h3>";
	echo "<h4>Tente Novamente!</h4>";
	echo "<h4>Caso o erro persista. Contate o Administrador.</h4>";
	 // Se houver mensagens de erro, exibe-as 

		foreach ($error as $erro) { 
			// echo "ERRO: <br />";
			// echo $erro . "" . "<br />"; 
			echo "Os dados não foram cadastrados." . "<br />";
			echo "<a href='matricula.php'>Continue sua matricula</a>";
		} 
	 
}
}

?>
</div>
<?php include("footer.php");  ?>