<?php 
include("../config.php"); 
include("../header.php");
include("PagSeguroLibrary.php"); ?>
?>
<div id="conteudo">
<br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br />
	<?php 
	
	echo $codigo = $_GET['codigo'];

	$credentials = new PagSeguroAccountCredentials(  
    'wmacibnc@hotmail.com',   
    'E8FDD1B9F64442FFB01DE4B77145A919'  
);  

/* Código identificador da transação  */    
$transaction_id = $codigo;  
  
/*  
    Realizando uma consulta de transação a partir do código identificador  
    para obter o objeto PagSeguroTransaction 
*/   
$transaction = PagSeguroTransactionSearchService::searchByCode(  
    $credentials,  
    $transaction_id  
);  

	$status = $transaction->getStatus()->getValue();
	echo "Status: ".$status;
	//echo "Referência: ".$transaction->getReference->getValue();

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




</div>
<?php include("../footer.php");  ?>	