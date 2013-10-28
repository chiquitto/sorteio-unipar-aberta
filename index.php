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
			$telefone = $_POST['telefone'];
			$colegio = $_POST['colegio'];
			$serie = $_POST['serie'];
			$email = $_POST['email'];
			$turma = $_POST['turma'];
			$cidade_id = $_POST['cidade'];
			$sorteado = "N";
			$sexo = $_POST['sexo'];
			CadPessoa ($nome, $dtnascimento, $colegio, $serie, $cidade_id, $sorteado, $sexo, $telefone, $turma, $email);
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
              <label>Turma:</label>
              <select name="turma" title="Selcione uma turma">
                <? $turma = mysql_query("select * from turma order by id desc");
				while ($rsTurma = mysql_fetch_array($turma)){
				?>
                <option value="<?=$rsTurma['id']?>"><?=$rsTurma['id']?></option>
                <? } ?>
                </optgroup>
              </select>
              <a href="addturma.php" >Adicionar Nova Turma</a>
            </div>
            
            <div class="row">
              <label>Nome:</label>
              <input type="text" name="nome" title="Nome" value="<?=$_POST['nome']?>" />
            </div>
            <div class="row">
              <label>Data de Nascimento:</label>
              <input type="text"  OnKeyUp="mascaraData(this);" maxlength="10" value="<?=$_POST['data']?>" name="data" title="Data de nascimento" />
            </div>
            <div class="row">
              <label>Telefone:</label>
              <input type="text"   value="<?=$_POST['telefone']?>" name="telefone" title="Telefone" />
            </div>
             <div class="row">
              <label>Sexo:</label>
              Masculino<input name="sexo" value="M" type="radio" class="radio" checked="checked" />

              Feminino<input name="sexo" value="F" type="radio" class="radio" />
             
              <br class="cl" />
            </div>
            <div class="row">
              <label>Cidade:</label>
              <select name="cidade" title="Selcione uma cidade">
                <? $sql = mysql_query("select * from cidade");
				while ($rsCidade = mysql_fetch_array($sql)){
				?>
                <option value="<?=$rsCidade['id']?>"><?=$rsCidade['cidade']." - ".$rsCidade['uf']?></option>
                <? } ?>
                </optgroup>
              </select>
            </div>
            <div class="row">
              <label>Email:</label>
              <input type="text" name="email"  value="<?=$_POST['email']?>" title="email" />
            </div>
            <div class="row">
              <label>Colegio:</label>
              <input type="text" name="colegio"  value="<?=$_POST['colegio']?>" title="colegio" />
            </div>
            <div class="row">
              <label>Serie:</label>
              <input type="text" name="serie" title="serie" value="<?=$_POST['serie']?>"/>
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