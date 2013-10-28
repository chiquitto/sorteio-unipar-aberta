<?php
## =================================
   ## Funções Básicas
## =================================
//Converte data ex: 16/08/1989
function dma($data) {
  $stri=explode('-',$data);
  return $stri[2].'/'.$stri[1].'/'.$stri[0];
}
//Converte data ex: 1989/08/16
function amd($data) {
  $stri=explode('/',$data);
  return $stri[2].'-'.$stri[1].'-'.$stri[0];
}

// Formata data AAAA-MM-DD para DD/MM/AAAA
function databr($datasql) {
	if (!empty($datasql)){
	$p_dt = explode('-',$datasql);
	$data_br = $p_dt[2].'/'.$p_dt[1].'/'.$p_dt[0];
	return print $data_br;
	}
}
 
// Formata data DD/MM/AAA para AAAA-MM-DD
function datasql($databr) {
	if (!empty($databr)){
	$p_dt = explode('/',$databr);
	$data_sql = $p_dt[2].'-'.$p_dt[1].'-'.$p_dt[0];
	return $data_sql;
	}
}
 //Normaliza o sexo transformando 'M' ou 'F' em 'Masculino' ou 'Feminino':
 function normalizaSexo($sexo){
	if($sexo == "M"){
		return("Masculino");
	}elseif($sexo == "F"){
		return("Femino");
	}else{
		return("Nao fornecido");
	}
 }
//Retira Aencetos
function retirarAcentosCaracteresEspeciais($string) {
	$palavra = strtr($string, "ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
	$palavranova = str_replace("_", " ", $palavra);
	return $palavranova; 
}
// pega a extensão do arquivo
function PegaExt($arquivo){
   $ext = explode('.',$arquivo);
   $ext = array_reverse($ext);
   return ".".$ext[0]; 
}
 // pega o nome do arquivo
function PegaNomeArquivo($arquivo){
   $ext = explode('.',$arquivo);
   $ext = $ext;
   return $ext[0]; 
}
//função básica anti sql inject
// @param   string  $string    String contendo o texto
function AntiInj($str){
        $str = mysql_real_escape_string($str);
        $str = strip_tags($str);
        $str = trim($str);
        return $str;
}

//limita chars
function limit($nb,$var) {
    $max= $nb; 
     if(strlen($var)>=$max)
     {
       $var    = substr($var,0,$max); 
       $espace = strrpos($var," "); 
       $var    = substr($var,0,$espace)."...";
	   $var    = htmlspecialchars($var);
     } 
    return $var ;
}

function calcula_idade($data_nascimento) {

    $data_nasc = explode('-', $data_nascimento);
    $data = date('Y-m-d');
    $data = explode("-", $data);
    $anos = $data[0] - $data_nasc[0];
    
    if ($data_nasc[1] >= $data[1]){
        if ($data_nasc[2] <= $data[2]){
            return $anos; break;
        } else {
            return $anos-1;
            break;
        } 
    } else {
        return $anos;
    } 
}



function CadPessoa ($nome, $dtnascimento, $colegio, $serie, $cidade_id, $sorteado, $sexo, $telefone, $turma_id, $email) {
	$lista = mysql_query("INSERT INTO pessoa (nome, dtnascimento, colegio, serie, cidade_id, sorteado, sexo, telefone, turma_id, email) VALUES ('$nome', '$dtnascimento', '$colegio', '$serie', '$cidade_id', '$sorteado', '$sexo', '$telefone', '$turma_id', '$email');")or die ("Erro ao cadastrar pessoa".mysql_error());
	return $lista;
}
function CadCidade ($cidade, $uf) {
	$lista = mysql_query("INSERT INTO cidade (cidade, uf) VALUES ('$cidade', '$uf');")or die ("Erro ao cadastrar cidade");
	return $lista;
}
function ListaPessoas () { 
	$lista = mysql_query("SELECT p.*, c.cidade, c.uf FROM pessoa AS p 
INNER JOIN cidade AS c ON p.cidade_id = c.id ")or die ("Erro ao listar");
	return $lista; 
}
function ExcPessoas ($id) {
	$lista = mysql_query("DELETE FROM pessoa WHERE id = '$id'")or die ("Erro ao excluir");
	return $lista;
}
function BuscaPessoa ($id) {
	$lista = mysql_query(" select * from pessoa where id = '$id' ")or die ("Erro ao buscar");
	return $lista;
}
function BuscaPessoaComFiltro ($campo, $valor) {
	$lista = mysql_query(" select * from pessoa where $campo = '$valor' ")or die ("Erro ao buscar");
	return $lista;
}
function sorteiaPessoa ($turma) {
	$lista = mysql_query("SELECT * FROM pessoa WHERE turma_id = '$turma' AND sorteado = 'N' ORDER BY RAND() LIMIT 1")or die ("Erro ao sortear");
	return $lista;
}
function CadTurma () { 
	$lista = mysql_query("INSERT INTO turma (data) VALUES (now()); ")or die ("Erro ao sortear");
	return $lista;
}
function BuscaUltimaTurma () { 
	$lista = mysql_query("SELECT * FROM turma ORDER BY id DESC LIMIT 1")or die ("Erro ao buscar turma");
	return $lista;
}
function CadastraGanhadores ($ganhador) { 
	$lista = mysql_query("INSERT INTO ganhadores (data, pessoa_id) VALUES (now(), '$ganhador');")or die ("Erro ao cadastrar canhador");
	return $lista;
}
function  AtualizarPessoaGanhadora ($id) { 
	$lista = mysql_query("UPDATE pessoa SET sorteado = 'S' WHERE id = '$id' ;")or die ("Erro ao cadastrar canhador");
	return $lista;
}
