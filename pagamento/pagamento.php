<head>
  <base href="/onyx/" />
</head>
<?php 
include ("../header.php");
include ("../config.php");
include("PagSeguroLibrary.php"); ?>

<div id="conteudo">

<?php


$aluno_id = $_SESSION['UsuarioID'];
$curso_id = $_SESSION['curso_id'];
$cupom = $_SESSION['cupom'];

$dataVinculo = 'null';
$matricula1 = str_pad( $aluno_id, 4, '0', STR_PAD_LEFT );
$matricula2 = str_pad(rand(1,10000), 4, '0', STR_PAD_LEFT );
$matricula = $matricula1 . $matricula2;


$query = <<<QUERY
INSERT INTO usuario_curso(
  usuario_id, 
  curso_id, 
  dataVinculo, 
  aula_atual,
  matricula,
  situacao
  )
VALUES (
  '$aluno_id',
  '$curso_id',
  '$dataVinculo',
  '0',
  '$matricula',
  '0'
  )
QUERY;
mysql_query($query) or die ('ERRO: '.mysql_error());

  $resultado = mysql_query("select * from usuario where id=".$aluno_id);
  $aluno = mysql_fetch_array($resultado);

  $resultado2 = mysql_query("select * from curso where id=".$curso_id);
  $curso = mysql_fetch_array($resultado2);

  $sql = "select * from cupom where nome like '".$cupom."'";
  $resultado3 = mysql_query($sql);
  $cupons = mysql_fetch_array($resultado3);

  echo "<h4>Usuário: ".$aluno['nome']."</h4>";
  echo "<h4>Curso: ".$curso['nome']."</h4>";
  echo "<h4>Investimento: ".$curso['valor'].",00</h4>";

  if(!empty($cupom)){
  if(mysql_num_rows($resultado3)>=1){
  echo "<h4>Desconto: ".$cupons['desconto']."% - CUPOM: ".$cupons['nome']." </h4>";
  $percentual = $cupons['desconto'] / 100.0; // 15%
  }else{
    echo "<h4> Cupom informado não localizado/Inválido! </h4>";
    $percentual = 0.0;
  }
  }else{
    $percentual = 0.0;
    echo "<h4> Não foi informado cupom na sua compra. </h4>";
  }

  
  $valor = $curso['valor']; // valor original
  $valor_final = $valor - ($percentual * $valor);
  
  echo "<h4>Total Investimento: ".$valor_final.",00</h4>";
  echo "<h4>Matricula: ".$matricula."</h4>";

$curso_nome = $curso['nome'];
$curso_valor = $valor_final.".00";

$aluno_nome = $aluno['nome'];
$aluno_email = $aluno['email'];
$aluno_cep = $aluno['cep'];
$aluno_endereco = $aluno['endereco'];
$aluno_complemento = $aluno['complemento'];
$aluno_numero = $aluno['numero'];
$aluno_bairro = $aluno['bairro'];
$aluno_cidade = $aluno['cidade'];
$aluno_uf = $aluno['uf'];
$aluno_dd = $aluno['ddtelefone'];
$aluno_telefone = $aluno['telefone'];

// Cria o objeto Pagsegguro de pagamento
$paymentRequest = new PagSeguroPaymentRequest();  

$paymentRequest->addItem('0001', "Acesso ao curso Online de ".$curso_nome, 1, $curso_valor); 

// Dados do comprador
$paymentRequest->setSender(  

    $aluno_nome,   
    $aluno_email,   
    $aluno_dd,   
    $aluno_telefone  
);  

// Dados do endereço do comprador
$paymentRequest->setShippingAddress(  

    $aluno_cep,   
    $aluno_endereco,       
    $aluno_numero,       
    $aluno_complemento,       
    $aluno_bairro,      
    $aluno_cidade,      
    $aluno_uf,     
    'BRA'     
);  

// Moeda corrente - BRL
$paymentRequest->setCurrency("BRL");  

// Tipo de Frete
// 1	 PAC	 Encomenda normal
// 2	 SEDEX	 SEDEX dos Correios
// 3	 NOT_SPECIFIED	 Não especificar tipo de frete
$paymentRequest->setShippingType(3);

// Código de referência
$paymentRequest->setReference($matricula);

// Informando as credenciais  
$credentials = new PagSeguroAccountCredentials(  
    'institutoonyx@hotmail.com',   
    '1A3E146F20ED42C1A9E95D462FD2CD27'  
);  


// fazendo a requisição a API do PagSeguro pra obter a URL de pagamento  
$url = $paymentRequest->register($credentials);

echo "<a href='".$url."' target='_blank'><img src='imagens/icone/pagseguro.png'</a>";

include("../footer.php");
?>