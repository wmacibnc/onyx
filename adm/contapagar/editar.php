<?php
include("../../config.php");  
include("../header.php");  
?>

<?php

$id = $_POST['id'];


echo "<h3>Altera&ccedil;&atilde;o de Contas a Pagar</h3>";

$res = mysql_query("select * from contapagar WHERE id='$id'"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
while($contapagar=mysql_fetch_array($res)){


  /*Escreve cada linha da tabela*/
  echo 
  
  '    
  <form method="post" action="atualizar.php" enctype="multipart/form-data">
  <input type="hidden" name="id" value="'. $contapagar['id'].'" />

 <label>Nome: </label>   <br />
 <input type="text" name="nome" id="nome" value="'. $contapagar['nome'].'"/><br/>

 <label>Data de Vencimento: </label>   <br />
 <input type="text" name="datavencimento" id="datavencimento" value="'. $contapagar['datavencimento'].'"/><br/>

 <label>Data do Pagamento: </label>   <br />
 <input type="text" name="datapagamento" id="datapagameto" value="'. $contapagar['datapagamento'].'"/><br/>

 <label>Valor: </label>   <br />
 <input type="text" name="valor" id="valor" value="'. $contapagar['valor'].'"/><br/>

 <label>Observacao: </label> <br />  
 <input type="text" name="observacao" id="observacao" value="'. $contapagar['observacao'].'" /><br/> 
 
</tr>'; 

?>

<tr>
 <td></td>
 <td><input name="Editar" type="submit" value="Editar" /></td>
</tr>
</table>  
<?php	
} 
?>

</form>
<?php include("../footer.php");  ?>