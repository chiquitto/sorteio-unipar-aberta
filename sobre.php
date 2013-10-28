<? include ("include/conexao.php"); 
	include ("class/all.php");


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
        <div class="box-header"> Sobre </div>
        <div class="box">
          <h2>Sistema de sorteio da unipar</h2>
          <p> Sistema desenvolvido por Ricardo Zacharias com finalidade academica quais quer duvidas e ou sugestões entre em contato pelo meu email ricardozacarias13@gmail.com  ou pelo tel (44) 9911-5786</p>
          
        </div>
        
       
        
        
      </div>
      

    </div>
  </div>
  <br class="cl" />
  
  <? include ("include/rodape.php"); ?>
</div>


</body>
</html>