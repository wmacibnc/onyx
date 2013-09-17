<?php
session_start();
include("../../config.php");  
include("../header.php");  
?>

<?php

$id = $_POST['id'];


echo "<h3>Altera&ccedil;&atilde;o de Conv&ecirc;nio</h3>";

$res = mysql_query("select * from convenio WHERE id='$id'"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
while($convenio=mysql_fetch_array($res)){


  /*Escreve cada linha da tabela*/
  echo 
  
  '    
  <form method="post" action="atualizar.php" enctype="multipart/form-data">
  <input type="hidden" name="id" value="'. $convenio['id'].'" />
  <input type="hidden" name="logo_old" value="'. $convenio['logo'].'" />

  <label>Logomarca: </label> 
  <input type="file" name="logo" id="logo"/><br />

  <label>Categoria: '.$convenio['categoria_id'].'</label>
  <input type="hidden" name="categoria_id" id="categoria_id" value="'. $convenio['categoria_id'].'"/><br/>

 <label>Nome: </label>   <br />
 <input type="text" name="nome" id="nome" value="'. $convenio['nome'].'"/><br/>

 <label>Telefone: </label>   <br />
 <input type="text" name="telefone" id="telefone" value="'. $convenio['telefone'].'" /><br/>

 <label>E-mail: </label>   <br />
 <input type="text" name="email" id="email" value="'. $convenio['email'].'" /><br/>

 <label>Resumo: </label>   <br />
 <input type="text" name="resumo" id="resumo" value="'. $convenio['resumo'].'" /><br/>

 <label>Slogan: </label>   <br />
 <input type="text" name="slogan" id="slogan" value="'. $convenio['slogan'].'" /><br/>

 <label>Descontos: </label>    <br />
 <input type="text" name="desconto" id="desconto" value="'. $convenio['desconto'].'" /><br/>

 <label>Serviços: </label>   <br />
 <input type="text" name="servico" id="servico" value="'. $convenio['servico'].'" /><br/>

 <label>CEP: </label>    <br />
 <input type="text" name="cep" id="cep" value="'. $convenio['cep'].'" /><br/>

 <label>Endereço: </label>   <br />
 <input type="text" name="endereco" id="endereco" value="'. $convenio['endereco'].'" /><br/>

 <label>Bairro: </label>   <br />
 <input type="text" name="bairro" id="bairro" value="'. $convenio['bairro'].'" /><br/>

 <label>Cidade: </label>   <br />
 <input type="text" name="cidade" id="cidade" value="'. $convenio['cidade'].'" /><br/>

 <label>UF: </label>   <br />
 <input type="text" name="uf" id="uf" value="'. $convenio['uf'].'" /><br/>     

 <label>Observacao: </label> <br />  
 <input type="text" name="observacao" id="observacao" value="'. $convenio['observacao'].'" /><br/> 
 
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