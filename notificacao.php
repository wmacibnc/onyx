<?php
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

// Implementar atualização do cadastro do usuário e liberar acesso ao curso