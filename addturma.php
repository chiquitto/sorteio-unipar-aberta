<? include ("include/conexao.php"); 
	include ("class/all.php");
	CadTurma ();
	
	echo "<script language=\"JavaScript\">alert(\"Nova Turma Gerada ! Atualize\");</script>";
			echo "<script language=\"javascript\">location.href=('index.php');</script>";
	
	?>