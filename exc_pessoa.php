<? include ("include/conexao.php"); 
	include ("class/all.php");
//busca 
$pessoa =  BuscaPessoa ($_GET['id']);
$dados = mysql_fetch_array($pessoa);

//inserindo
if ($_POST['acao'] == "inserir") { 
		
		
		
		
				
		if ($erro <> ""){		
			//$msg="<div id='fail' class='info_div'><span class='ico_cancel'></span></div>";
			//$msg = "<div class='message error close'><h2>Ops algo deu errado !</h2><p>$erro</p></div>";
			$msg = " <div class='notification error'> <span class='strong'>Algo deu errado !</span> $erro </div>";
		}else {

			
			ExcPessoas ($_GET['id']);
			echo "<script language=\"JavaScript\">alert(\"Operação realizada com Sucesso. Clique para continuar.\");</script>";
			echo "<script language=\"javascript\">location.href=('pessoa.php');</script>";

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
          
        <div class="notification success"> <span class="strong">Cadastrado !</span> Cadastro Realisado com sucesso. </div>
          
        </div>
        <!-- NOTIFICATIONS END --> 
        <? } ?>
        <div class="box-header"> Cadastro para sorteio
          <ul id="forms-tabs" class="tabs fr">
            
          </ul>
        </div>
        <!-- FORMS - TAB 1 -->
        
        
        <div id="forms-tab1" class="box">
          <form method="post" action="#">
            <div class="row">
              <label>Nome:</label>
              <input type="text" name="nome" title="Nome" value="<?=$dados['nome']?>" />
            </div>
            <div class="row">
              <label>Data de Nascimento:</label>
              <input type="text"  OnKeyUp="mascaraData(this);" maxlength="10" value="<?=dma($dados['dtnascimento'])?>" name="data" title="Data de nascimento" />
            </div>
             <div class="row">
              <label>Sexo:</label>
              Masculino<input name="sexo" value="M" type="radio" class="radio" <? if ($dados['sexo'] == "M") echo "checked='checked'"; ?>  />

              Feminino<input name="sexo" value="F" type="radio" class="radio" <? if ($dados['sexo'] == "F") echo "checked='checked'"; ?> />
             
              <br class="cl" />
            </div>
            <div class="row">
              <label>Cidade:</label>
              <select name="cidade" title="Selcione uma cidade">
                <? $sql = mysql_query("select * from cidade order by id = ".$dados['cidade_id']."");
				while ($rsCidade = mysql_fetch_array($sql)){
				?>
                <option value="<?=$rsCidade['id']?>"><?=$rsCidade['cidade']." - ".$rsCidade['uf']?></option>
                <? } ?>
                </optgroup>
              </select>
            </div>
            <div class="row">
              <label>Colegio:</label>
              <input type="text" name="colegio"  value="<?=$dados['colegio']?>" title="colegio" />
            </div>
            <div class="row">
              <label>Serie:</label>
              <input type="text" name="serie" title="serie" value="<?=$dados['serie']?>"/>
            </div>
            
            <div class="row">
              
              <input type="submit" value="Excluir" class="button medium blue" />
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