<?php
include("pagamento/PagSeguroLibrary.php");

/* Informando as credenciais  */    
$credentials = new PagSeguroAccountCredentials(      
	'wmacibnc@hotmail.com',       
	'E8FDD1B9F64442FFB01DE4B77145A919'      
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
echo $status = $transaction->getStatus();

/*
1 - Aguardando Pagamento
2 - Em análise
3 - Paga
4 - Disponível
5 - Em disputa
6 - Devolvida
7 - Cancelada

*/
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
	echo "Aguarde processamento manual.";
	break;
}

?>