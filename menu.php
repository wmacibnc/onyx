<?php 

/**
* Função imprimeMenuInfinito - Função recursiva utilizada para imprimir
* menu com submenus em níveis infinitos.
*
* @author MatiasRezende - contato@matiasrezende.com.br
* @license http://creativecommons.org/licenses/by-sa/2.5/br/
* @param array $menuTotal - Array do menu a ser impresso
* @param $idPai - Id da categoria pai
*/
function imprimeMenuInfinito( array $menuTotal , $idPai = 0, $nivel = 0 )
{
// abrimos a ul do menu principal
echo str_repeat( "<br />" , $nivel ),'

',PHP_EOL;
// itera o array de acordo com o idPai passado como parâmetro na função
foreach( $menuTotal[$idPai] as $idMenu => $menuItem)
{
// imprime o item do menu
echo str_repeat( "<br />" , $nivel + 1 ),'
',$menuItem['name'],'',PHP_EOL;
// se o menu desta iteração tiver submenus, chama novamente a função
if( isset( $menuTotal[$idMenu] ) ) imprimeMenuInfinito( $menuTotal , $idMenu , $nivel + 2);
// fecha o li do item do menu
echo str_repeat( "<br />" , $nivel + 1 ),'
',PHP_EOL;
}
// fecha o ul do menu principal
echo str_repeat( "<br />" , $nivel ),'

',PHP_EOL;
}

$mysqli = new mysqli('localhost','root','','onyx');

$query = $mysqli->query('SELECT * FROM menu ORDER BY menuIdPai');
while( $row = $query->fetch_object() )
{
$menuItens[$row->menuIdPai][$row->menuId] = array( 'link' => $row->menuLink,'name' => $row->menuNome );
}
imprimeMenuInfinito( $menuItens );
?>