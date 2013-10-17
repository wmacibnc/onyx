<?php include("PagSeguroLibrary.php"); ?>

<html>

<head>

</head>

<body>

<h3>Integração Funcionando</h3>



<?php



// Cria o objeto Pagsegguro de pagamento

$paymentRequest = new PagSeguroPaymentRequest();  

$paymentRequest->addItem('0001', 'Notebook', 1, 2430.00);  

$paymentRequest->addItem('0002', 'Mochila',  1, 150.99);  



// Dados do comprador

$paymentRequest->setSender(  

    'José Comprador',   

    'comprador@uol.com.br',   

    '11',   

    '56273440'  

);  



// Dados do endereço do comprador

$paymentRequest->setShippingAddress(  

    '01452002',   

    'Av. Brig. Faria Lima',       

    '1384',       

    'apto. 114',       

    'Jardim Paulistano',      

    'São Paulo',      

    'SP',     

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

$paymentRequest->setReference("I9635");



// Informando as credenciais  

$credentials = new PagSeguroAccountCredentials(  
    'wmacibnc@hotmail.com',   
    'E8FDD1B9F64442FFB01DE4B77145A919'  
);  


// fazendo a requisição a API do PagSeguro pra obter a URL de pagamento  

$url = $paymentRequest->register($credentials);



echo $url;


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

echo "Status: ".$transaction->getStatus()->getValue();
 ?>

</body>

</html>

