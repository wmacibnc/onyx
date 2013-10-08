<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php

  $res = mysql_query("select * from turma"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  echo "<h3>Turmas Cadastradas</h3>";
  echo "<a href='turma/cadastro.php'><img src='../imagens/icone/curso_adiciona-icone.png'></a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Nome</th>
        <th>Cap.</th>
        <th>Inicio</th>
        <th>Mod.</th>
        <th>Val.Mod.</th>
        <th>Val.</th>
        <th>Cont.</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
  </thead>

  <tbody>";

  while($turma=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td align='center'>".$turma['id'] ."</td>
    <td align='center'>".$turma['nome'] ."</td>
    <td align='center'>".$turma['quantidade'] ."</td>
    <td align='center'>".$turma['dataInicio'] ."</td>
    <td align='center'>".$turma['qtd_mod'] ."</td>
    <td align='center'>".$turma['validadeModulo'] ."</td>
    <td align='center'>".$turma['validade'] ."</td>

    <td>
    <form method='get' action='turma/lista_dados_turma.php'> 
    <input type='hidden' name='turma' value='".$turma['id']."'/>
    <input name='Lista' type='submit' value='Lista' />
    </form>
    </td>
    <td>
    <form method='post' action='turma/editar.php'> 
    <input type='hidden' name='id' value='".$turma['id']."'/>
    <input name='Editar' type='submit' value='Editar' />
    </form>
    </td>
    <td>
    <form method='post' action='turma/deletar.php'> 
    <input type='hidden' name='id' value='".$turma['id']."'/>
    <input name='Excluir' type='submit' value='Excluir' />
    </form>
    </td>

    </tr>
    ";
  }
  ?>
</tbody>
    </table>
    <p align="center">Instituto Onyx - Todos os direitos reservados.</p>
<?php include("../footer.php"); ?>