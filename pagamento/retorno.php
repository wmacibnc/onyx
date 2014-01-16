<head>
	<base href="http://www.institutoonyx.com.br" />
</head>
<?php 
include("../config.php"); 
include("../header.php");

include("PagSeguroLibrary.php"); 
?>

<div id="conteudo">
    <h3> Estamos quase chegando ao final.</h3>
    <?php

    $type = $_GET['codigo'];    

    echo "<h4> Anote o código da sua Transação</h4>" . $type;
    
    /* Definindo as credenciais  */    
    $credentials = new PagSeguroAccountCredentials(      
      'institutoonyx@hotmail.com',       
      '1A3E146F20ED42C1A9E95D462FD2CD27'      
      );  

    /* Código identificador da transação  */    
    $transaction_id = $type;  

	/*  
    Realizando uma consulta de transação a partir do código identificador  
    para obter o objeto PagSeguroTransaction 
	*/   
    $transaction = PagSeguroTransactionSearchService::searchByCode(  
    	$credentials,  
    	$transaction_id  
    	);  
    
    $status = $transaction->getStatus()->getValue();
    $matricula = $transaction->getReference();

    echo "<h4> Anote o número da sua Matricula: </h4>" . $matricula;

    $consulta = mysql_query("select * from usuario_curso where matricula='".$matricula."'");
    $resultado = mysql_fetch_array($consulta);

    $id = $resultado['id'];

    $editar = "UPDATE `usuario_curso` SET `codigoPagseguro` = '".$transaction_id."'
    WHERE (`id` = ".$id.")";

    /* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
    mysql_query($editar) or die ('ERRO: '.mysql_error());


    echo " <h4>Situação da sua transação até o momento: </h4>";
    switch ($status) {
    	case '1':
    	echo "Aguardando Pagamento";
    	break;

    	case '2':
    	echo "Em análise";
    	break;

    	case '3':
    	echo "Paga";
    	break;

    	case '4':
    	echo "Disponível";
    	break;

    	case '5':
    	echo "Em disputa";
    	break;

    	case '6':
    	echo "Devolvida";
    	break;

    	case '7':
    	echo "Cancelada";
    	break;

    	default:
    	echo " Aguarde Processamento Manual";
    	break;
    }

    ?>
</div>
<?php include("../footer.php");  ?>	