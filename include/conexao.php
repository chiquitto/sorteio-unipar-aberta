<?
	error_reporting(E_ALL ^ E_NOTICE);

 	$server = "localhost";
 	$user = "root";
 	$pass = "teste";
 	$db = "uniparsorteio";
$conexao = mysql_connect($server,$user,$pass);
if (mysql_select_db($db, $conexao)){

}else {
	echo "Erro ao conectar a tabela !";
}