<? include ("include/conexao.php"); 
	include ("class/all.php");
//inserindo
if ($_POST['acao'] == "inserir") { 
		
		

		if ($_POST['cidade'] =="") {
			$erro = $erro."<br>Informe o nome da cidade.<br />";
		}
		if ($_POST['uf'] =="") {
			$erro = $erro."<br>Informe um UF.<br />";
		}
		
				
		if ($erro <> ""){		
			//$msg="<div id='fail' class='info_div'><span class='ico_cancel'></span></div>";
			//$msg = "<div class='message error close'><h2>Ops algo deu errado !</h2><p>$erro</p></div>";
			$msg = " <div class='notification error'> <span class='strong'>Algo deu errado !</span> $erro </div>";
		}else {

			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			CadCidade ($cidade, $uf);
			echo "<script language=\"JavaScript\">alert(\"Operação realizada com Sucesso. Clique para continuar.\");</script>";
			echo "<script language=\"javascript\">location.href=('cad_cidade.php?st=ok');</script>";

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
      <?php if ($msg <> "") {?>
                <!-- NOTIFICATIONS -->
        <div id="forms-tab3" class="box">
          
         <? echo $msg;  ?>
          
        </div>
        <!-- NOTIFICATIONS END --> 
        <? } ?>
         <?php if ($_GET['st'] == "ok") {?>
                <!-- NOTIFICATIONS -->
        <div id="forms-tab3" class="box">
          
        <div class="notification success"> <span class="strong">Cadastrado !</span> Cadastro realisado com sucesso. </div>
          
        </div>
        <!-- NOTIFICATIONS END --> 
        <? } ?>
        <div class="box-header"> Cadastro de cidade
          <ul id="forms-tabs" class="tabs fr">
            
          </ul>
        </div>
        <!-- FORMS - TAB 1 -->
        
        
        <div id="forms-tab1" class="box">
          <form method="post" action="#">
            <div class="row">
              <label>Cidade:</label>
              <input type="text" name="cidade" title="Cidade" />
            </div>
            <div class="row">
              <label>UF:</label>
              <input type="text"  name="uf" title="UF" />
            </div>
            
            <div class="row">
              
              <input type="submit" value="Cadastrar" class="button medium blue" />
              <input type="reset" value="Limpar" class="button medium" />
              <input type="hidden" value="inserir" name="acao" />
            </div>
          </form>
        </div>
       
        
        
      </div>
      

    </div>
  </div>
  <br class="cl" />
  
  <? include ("include/rodape.php"); ?>
</div>


</body>
</html>