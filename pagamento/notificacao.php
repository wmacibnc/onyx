<head>
	<base href="/onyx/" />
</head>
<?php 
include("../config.php"); 
include("../header.php");

include("PagSeguroLibrary.php"); 
?>

<div id="conteudo">
	<h3>Notificação de Retorno </h3>
	<?php

	/* Definindo as credenciais  */    
	$credentials = new PagSeguroAccountCredentials(      
		'institutoonyx@hotmail.com',       
		'1A3E146F20ED42C1A9E95D462FD2CD27'      
		);  

    /* Tipo de notificação recebida */  
    $type = $_POST['notificationType'];  

    /* Código da notificação recebida */  
    $code = $_POST['notificationCode'];  


    /* Verificando tipo de notificação recebida */  
    if ($type === 'transaction') {  

        /* Obtendo o objeto PagSeguroTransaction a partir do código de notificação */  
        $transaction = PagSeguroNotificationService::checkTransaction(  
            $credentials,  
        $code // código de notificação  
        );  

    }  

    /* objeto PagSeguroTransactionStatus */    
    $status = $transaction->getStatus();  
    $matricula = $transaction->getReference();

    $consulta = mysql_query("select * from usuario_curso where matricula='".$matricula."'");
    $resultado = mysql_fetch_array($consulta);

    $id = $resultado['id'];

    $editar = "UPDATE `usuario_curso` SET `situacao` = '1'
    WHERE (`id` = ".$id.")";

    /* Faço a inserção no banco de dados e caso haja algum erro na inserção, será retornado através da função mysql_error() */
    mysql_query($editar) or die ('ERRO: '.mysql_error());

    ?>
</div>
<?php include("../footer.php");  ?>	