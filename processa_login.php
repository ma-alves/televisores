<?php
	session_start ();
	
	$conectar = mysqli_connect ("localhost", "root", "#senai0308", "televisores");
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];	
		
	$sql_consulta = "SELECT cod_fun, nome_fun, funcao_fun, usuario_fun, senha_fun
					 FROM funcionarios
					 WHERE 
					       usuario_fun = '$login' 
					 AND 
					       senha_fun = '$senha'
				     AND
						   status_fun = 'ativo'";
					 
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
	
	$linhas = mysqli_num_rows ($resultado_consulta);
	
	
	if ($linhas == 1) {			
		$registro = mysqli_fetch_row ($resultado_consulta);
		$_SESSION["cod_fun"] = $registro[0];
		$_SESSION["nome_fun"] = $registro[1];
		$_SESSION["funcao_fun"] = $registro[2];
		
		echo "<script> 
					location.href = ('administracao.php') 
			  </script>";
	}
	else {
		echo "<script> 
				  alert ('Login ou Senha Incorretos! Digite Novamente!!') 
			  </script>";
		echo "<script> location.href = ('index.php') </script>";
	}
?>