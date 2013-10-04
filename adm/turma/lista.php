<?php
include("../header.php");
include("../../config.php"); 
?>
<div id="conteudo_curso">

  <?php

  $res = mysql_query("select * from turma"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

  /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
  echo "<h3>Turmas Cadastradas</h3>";
  echo "<a href='turma/cadastro.php'> Novo </a>";
  echo "<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
    <thead>
      <tr>
        <th>Cod.</th>
        <th>Nome</th>
        <th>Capacidade</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
  </thead>

  <tbody>";

  while($turma=mysql_fetch_array($res)){

    /*Escreve cada linha da tabela*/
    echo "  

    <tr>

    <td>".$turma['id'] ."</td>
    <td>".$turma['nome'] ."</td>
    <td>".$turma['quantidade'] ."</td>

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