<?php
	$conectar = mysqli_connect ("localhost", "root", "#senai0308", "tever");
	
	$nome_fun = $_POST["nome"];
    $cpf_fun = $_POST["cpf"];
	$usuario_fun = $_POST["usuario_fun"];
	$senha_fun = $_POST["senha_fun"];
	$telefone_fun = $_POST["telefone_fun"];
	$salario_fun = $_POST["salario_fun"];
	$endereco_fun = $_POST["endereco_fun"];
	$data_nasc_fun = $_POST["data_nasc_fun"];
	$email_fun = $_POST["email_fun"];
	$status_fun = $_POST["status_fun"];
	$funcao_fun = $_POST["funcao_fun"];
	
	$sql_consulta = "SELECT usuario_fun FROM funcionarios 
					 WHERE usuario_fun = '$usuario_fun'";
							 
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
		
	$linhas = mysqli_num_rows ($resultado_consulta);		
		
	if ($linhas == 1) {
	
		echo "<script> 
					alert ('Login ja cadastrado. Tente outro!') 
		      </script>";
			  
		echo "<script> 
					location.href = ('cadastra_fun.php') 
			  </script>";			
	} else {
		$sql_cadastrar = "INSERT INTO funcionarios 
                            (nome_fun,
                            cpf_fun,
                            usuario_fun,
                            senha_fun,
                            telefone_fun,
                            salario_fun,
                            endereco_fun,
                            data_nasc_fun,
                            email_fun,
                            status_fun,
                            funcao_fun)
						  VALUES 
                            ('$nome_fun',
                            '$cpf_fun',
                            '$usuario_fun',
                            '$senha_fun',
                            '$telefone_fun',
                            '$salario_fun',
                            '$endereco_fun',
                            '$data_nasc_fun',
                            '$email_fun',
                            '$status_fun',
                            '$funcao_fun')";

		$resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
		
		if ($resultado_cadastrar == true) { 		
			echo "<script> 
					alert ('Cadastro feito com sucesso.') 
				  </script>";
			
			echo "<script> 
					location.href = ('cadastra_fun.php') 
				  </script>";	
		}
		else { 		
			echo "<script> 
					alert ('Ocorreu um erro no servidor. Tente novamente.')
			     </script>";
			echo "<script> 
					location.href = ('cadastra_fun.php') 
				  </script>";		
		}	
	}
?>