<?php include("PagSeguroLibrary.php");


$credentials = new PagSeguroAccountCredentials(  
    'wmacibnc@hotmail.com',   
    'E8FDD1B9F64442FFB01DE4B77145A919'  
);  

/* Código identificador da transação  */    
$transaction_id = '23601080-535C-4B4A-BD26-AA01E55DA9D7';  
  
/*  
    Realizando uma consulta de transação a partir do código identificador  
    para obter o objeto PagSeguroTransaction 
*/   
$transaction = PagSeguroTransactionSearchService::searchByCode(  
    $credentials,  
    $transaction_id  
);  

$transaction->getStatus()->getValue();
?>

</body>

</html>

