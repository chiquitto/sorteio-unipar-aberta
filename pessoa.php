<? include ("include/conexao.php"); 
	include ("class/all.php");
//inserindo
if ($_POST['acao'] == "inserir") { 
		
		
		if ($_POST['nome'] =="") {
			$erro = $erro."<br>Informe um NOME.";
		}
		if ($_POST['data'] =="") {
			$erro = $erro."<br>Informe uma data de nascimento.";
		}
		if ($_POST['cidade'] =="") {
			$erro = $erro."<br>Informe uma cidade.";
		}
		if ($_POST['colegio'] =="") {
			$erro = $erro."<br>Informe um colegio.";
		}
		
				
		if ($erro <> ""){		
			//$msg="<div id='fail' class='info_div'><span class='ico_cancel'></span></div>";
			//$msg = "<div class='message error close'><h2>Ops algo deu errado !</h2><p>$erro</p></div>";
			$msg = " <div class='notification error'> <span class='strong'>Algo deu errado !</span> $erro </div>";
		}else {

			$nome = $_POST['nome'];
			$dtnascimento = datasql($_POST['data']);
			$colegio = $_POST['colegio'];
			$serie = $_POST['serie'];
			$cidade_id = $_POST['cidade'];
			$sorteado = "N";
			$sexo = $_POST['sexo'];
			CadPessoa ($nome, $dtnascimento, $colegio, $serie, $cidade_id, $sorteado, $sexo);
			echo "<script language=\"JavaScript\">alert(\"Operação realizada com Sucesso. Clique para continuar.\");</script>";
			echo "<script language=\"javascript\">location.href=('index.php?st=ok');</script>";

		}

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
        <div class="box-header">
          <ul id="tables-tabs" class="tabs fr">
            
          </ul>
          Pessoas </div>
        <!-- TABLES - TAB 1 -->
        <div id="table-tab1" class="box table tab-content">
          <table cellspacing="0">
            <thead>
              <tr>
                
                <td>Nome</td>
                <td>Colegio</td>
                <td>Cidade</td>
                <td>Idade</td>
                <td>Opção</td>
              </tr>
            </thead>
            <tbody>
             <? //gero os dados
			
			 
			 if ($_GET['filtro'] == "") { $pessoas = ListaPessoas (); } ;
			 if ($_GET['filtro'] == "sorteado") { $pessoas = BuscaPessoaComFiltro ("sorteado", "S"); } ;
			 if ($_GET['filtro'] == "naosorteado") { $pessoas = BuscaPessoaComFiltro ("sorteado", "N"); } ;
			 if (mysql_num_rows($pessoas)<> 0 ) {
			 	while ($rsPessoas = mysql_fetch_array($pessoas)){
             ?>
              <tr>
                
                <td> <?=$rsPessoas['nome']?> </td>
                <td> <?=$rsPessoas['colegio']?> </td>
                <td><?=$rsPessoas['cidade']?></td>
                <td> <?=calcula_idade($rsPessoas['dtnascimento'])?> anos </td>
                <td class="tc"><a class="tooltip" href="exc_pessoa.php?id=<?=$rsPessoas['id']?>" title="Deletar"><img src="img/icons/small/user_delete.png" alt="deletar" border="0" /></a></td>
              </tr>
              <? } } else { ?>
              <tr><td class="alt"> Nada encontrado ! </td></tr>
              <? } ?>
              
              
            </tbody>
          </table>
          
        </div>
        <!-- TABLES - TAB 2 -->
      
        <!-- TABLES END --> 
      </div>
        
       
        
        
      </div>
      

    </div>
  </div>
  <br class="cl" />
  
  <? include ("include/rodape.php"); ?>
</div>


</body>
</html>