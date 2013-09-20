<?php


// VERIFICA SE O CAMPO PDF ESTÁ VAZIO
if ($_FILES['pdf']['name'] != "") {
// SE O CAMPO NÃO ESTIVER VAZIO MOVE O ARQUIVO PARA UMA PASTA
 move_uploaded_file($_FILES['pdf']['tmp_name'],"c:/teste/".$_FILES['pdf']['name']);
 // $PDF_PATH É A VARIAVEL Q GUARDA O ENDEREÇO DO PDF(pra adicionar na base de dados)
 $pdf_path = "c:/teste/".$_FILES['pdf']['name'];
} else {
//CASO SEJA FALSO RETORNA ERRO
 echo "Não foi possível enviar o arquivo";
}

?>