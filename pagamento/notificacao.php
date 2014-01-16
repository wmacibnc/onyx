<head>
	<base href="http://www.institutoonyx.com.br/" />
</head>
<?php 
include("../config.php"); 
include("../header.php");
include("PagSeguroLibrary.php"); 
?>

<div id="conteudo">
	<h3>Notificação de Retorno </h3>
	<?php


    //Verifica se foi enviado um método post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Recebe o post como o Tipo de Notificação
    $tipoNotificacao   = $_POST['notificationType'];

    $sql1 = "INSERT INTO teste (obs) values('type: ".$tipoNotificacao."')";
    mysql_query($sql1) or die ('ERRO: '.mysql_error());


    //Recebe o código da Notificação
    $codigoNotificacao = $_POST['notificationCode'];

   $sql2 = "INSERT INTO teste (obs) values('code: ".$codigoNotificacao."')";
    mysql_query($sql2) or die ('ERRO: '.mysql_error());
    

    /* Definindo as credenciais  */    
    $credentials = new PagSeguroAccountCredentials(  
    'institutoonyx@hotmail.com',   
    '1A3E146F20ED42C1A9E95D462FD2CD27'  
    );  

    $transacao = PagSeguroNotificationService::checkTransaction($credentials, $codigoNotificacao);

    $status    = $transacao->getStatus()->getValue();;

    $sql3 = "INSERT INTO teste (obs) values('status: ".$status."')";
    mysql_query($sql3) or die ('ERRO: '.mysql_error());

    $matricula = $transacao->getReference();

    $sql = "INSERT INTO teste (obs) values('matricula: ".$matricula."')";
    mysql_query($sql) or die ('ERRO: '.mysql_error());

    $consulta = mysql_query("select * from usuario_curso where matricula='".$matricula."'");
    $resultado = mysql_fetch_array($consulta);

    $id = $resultado['id'];

    $hoje = date(yyyy-MM-dd);

    switch ($status) {
        case '1':
        echo "Aguardando Pagamento";
        $editar = "UPDATE `usuario_curso` SET `situacao` = '0', dataVinculo = now() WHERE (`id` = ".$id.")";
        mysql_query($editar) or die ('ERRO: '.mysql_error());

        break;

        case '2':
        echo "Em análise";
        $editar = "UPDATE `usuario_curso` SET `situacao` = '0' WHERE (`id` = ".$id.")";
        mysql_query($editar) or die ('ERRO: '.mysql_error());

        break;

        case '3':
        echo "Paga";
        $editar = "UPDATE `usuario_curso` SET `situacao` = '1', dataVinculo = now() WHERE (`id` = ".$id.")";
        mysql_query($editar) or die ('ERRO: '.mysql_error());
        break;

        case '4':
        echo "Disponível";
        $editar = "UPDATE `usuario_curso` SET `situacao` = '1', dataVinculo = now() WHERE (`id` = ".$id.")";
        mysql_query($editar) or die ('ERRO: '.mysql_error());
        break;

        case '5':
        echo "Em disputa";
        $editar = "UPDATE `usuario_curso` SET `situacao` = '0' WHERE (`id` = ".$id.")";
        mysql_query($editar) or die ('ERRO: '.mysql_error());
        break;

        case '6':
        echo "Devolvida";
        $editar = "UPDATE `usuario_curso` SET `situacao` = '0' WHERE (`id` = ".$id.")";
        mysql_query($editar) or die ('ERRO: '.mysql_error());
        break;

        case '7':
        echo "Cancelada";
        $editar = "UPDATE `usuario_curso` SET `situacao` = '0' WHERE (`id` = ".$id.")";
        mysql_query($editar) or die ('ERRO: '.mysql_error());
        break;

        default:
        echo " Aguarde Processamento Manual";
        $editar = "UPDATE `usuario_curso` SET `situacao` = '0' WHERE (`id` = ".$id.")";
        mysql_query($editar) or die ('ERRO: '.mysql_error());
        break;
    }
}


    ?>
</div>
<?php include("../footer.php");  ?>	