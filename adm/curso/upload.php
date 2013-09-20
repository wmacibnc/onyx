<form name="teste" method="post" action="envia_pdf.php" enctype="multipart/form-data">
<label> Selecione o arquivo PDF que deseja enviar.</label>
<input type="file" name="pdf" id="pdf" /><br /><br />
<input type="submit" name="envia" value="Enviar" />
</form>

<?php 
// criando diretorios do cursos
mkdir("mod", 0700);
mkdir("mod/1", 0700);
mkdir("mod/2", 0700);
mkdir("mod/3", 0700);
mkdir("mod/4", 0700);
mkdir("mod/5", 0700);
 ?>