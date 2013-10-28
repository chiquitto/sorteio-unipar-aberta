<? include ("include/conexao.php"); 
	include ("class/all.php");
$turma = BuscaUltimaTurma ();
$rsTurma = mysql_fetch_array($turma);

$sorteio = sorteiaPessoa($rsTurma['id']);
$rsSorteio = mysql_fetch_array($sorteio);

AtualizarPessoaGanhadora ($rsSorteio['id'] );
if( mysql_num_rows($sorteio) == 0 ) {
echo "<script language=\"JavaScript\">alert(\"Não há pessoas para sortear..\");</script>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- META TAGS -->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!-- /META TAGS -->
<!-- CSS -->
<style type="text/css">@import url("css/base.css");</style>
<style type="text/css">@import url("css/grid.css");</style>
<style type="text/css">@import url("css/extensions.css");</style>
<link href='css/themes/blue.css' rel='stylesheet' type='text/css' />


<!-- /CSS -->
<title>Sorteio Unipar </title>
<!-- JS -->
<script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.uniform.js"></script>
<script type="text/javascript" src="js/jquery.idTabs.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/jquery.facebox.js"></script>
<script type="text/javascript" src="js/jquery.visualize.js"></script>
<!--[if IE]>
<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="js/functions.js"></script>

<script language="JavaScript" type="text/javascript">
   function mascaraData(campoData){
              var data = campoData.value;
              if (data.length == 2){
                  data = data + '/';
                  document.forms[0].data.value = data;
      return true;              
              }
              if (data.length == 5){
                  data = data + '/';
                  document.forms[0].data.value = data;
                  return true;
              }
         }
</script>
<!-- /JS -->
</head>
<body class="layout980">
<div id="page-wrapper" class="width"> 
  <? include ("include/topo.php"); ?>
  <div id="page"> 
    <!-- OPEN GRID CONTAINER -->
    <div class="container_12">

      
      <br class="cl" />
      <!-- FORMS -->
      <div class="grid_12">

         <?php if ($_GET['st'] == "ok") {?>
                <!-- NOTIFICATIONS -->
        <div id="forms-tab3" class="box">
          
        <div class="notification success"> <span class="strong">Cadastrado !</span> Cadastro Realisado com sucesso. </div>
          
        </div>
        <!-- NOTIFICATIONS END --> 
        <? } ?>
        <div class="grid_12">
        <div class="box-header"> Sorteio </div>
        <div class="box">
          <h2>Turma :</h2><?=$rsTurma['id']?>
          <h2>O sortudo é :</h2>
          <p> <?=$rsSorteio['id']?> - <?=$rsSorteio['nome']?> - <?=$rsSorteio['telefone']?> - <?=calcula_idade($rsSorteio['dtnascimento'])?> anos - <?=$rsSorteio['colegio']?> - <?=$rsSorteio['serie']?></p>
          
          <?
		  //cadastrei o ganhador
		  CadastraGanhadores ($rsSorteio['id']);
		  ?>
          <strong>Parabéns  <?=$rsSorteio['nome']?></strong>
        </div>
        
       
        
        
      </div>
      

    </div>
  </div>
  <br class="cl" />
  
  <? include ("include/rodape.php"); ?>
</div>


</body>
</html>