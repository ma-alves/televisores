<?php	
    $env = parse_ini_file('.env');
    $senha_db = $env["SENHA_DB"];

	$conectar = mysqli_connect ("localhost", "root", $senha_db, "tever");
				
	$cod_fun = $_POST["cod_fun"];
	$funcao = $_POST["funcao_fun"];
	
	if ($funcao == "administrador") {
		$senha = $_POST["senha_fun"];
		$sql_altera = "UPDATE funcionarios SET senha_fun = '$senha' WHERE cod_fun = '$cod_fun'";
		$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
	
		if ($sql_resultado_alteracao == true) {
			echo "<script>
					alert('Senha do administrador alterada com sucesso.') 
				  </script>";
			echo "<script> 
					 location.href = ('lista_fun.php') 
				  </script>";
			exit();
		} else {    
			echo "<script> 
					alert('Ocorreu um erro no servidor. A senha do administrador não foi alterada.') 
				</script>";
			echo "<script> 
					location.href('altera_fun.php?cod_fun=$cod_fun') 
				 </script>";
			exit();
		}
	}	
	else {
		$nome_fun = $_POST["nome_fun"];;
        $cpf_fun = $_POST["cpf_fun"];
        $usuario_fun = $_POST["usuario_fun"];
        $senha_fun = $_POST["senha_fun"];
        $telefone_fun = $_POST["telefone_fun"];
        $salario_fun = $_POST["salario_fun"];
        $endereco_fun = $_POST["endereco_fun"];
        $data_nasc_fun = $_POST["data_nasc_fun"];
        $email_fun = $_POST["email_fun"];
        $status_fun = $_POST["status_fun"];
        $funcao_fun = $_POST["funcao_fun"];
        $cod_fun = $_POST["cod_fun"];
		
		$sql_pesquisa = "SELECT usuario_fun FROM funcionarios	
								  WHERE usuario_fun = '$usuario_fun' 							  
								  AND cod_fun <> '$cod_fun'";							  
		$sql_resultado = mysqli_query ($conectar, $sql_pesquisa);
								  
		$linhas = mysqli_num_rows($sql_resultado);		
		if ($linhas == 1) {
			echo "<script> 
				location.href = ('altera_fun.php?cod_fun=$cod_fun')
				  </script>";
			exit;	  
		} else {			
			$sql_altera = "UPDATE funcionarios 		
						   SET
                                nome_fun = '$nome_fun',
                                cpf_fun = '$cpf_fun',
                                usuario_fun = '$usuario_fun',
                                senha_fun = '$senha_fun',
                                telefone_fun = '$telefone_fun',
                                salario_fun = '$salario_fun',
                                endereco_fun = '$endereco_fun',
                                data_nasc_fun = '$data_nasc_fun',
                                email_fun = '$email_fun',
                                status_fun = '$status_fun',
                                funcao_fun = '$funcao_fun'
						   WHERE cod_fun = '$cod_fun'";

			$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
				
			if ($sql_resultado_alteracao == true) {
				echo "<script>
						alert('Funcionário alterado com sucesso')
					  </script>";
				echo "<script> 
						 location.href = ('lista_fun.php') 
					  </script>";
				exit();
			} else {    
				echo "<script> 
						alert ('Ocorreu um erro no servidor. Tente novamente.') 
					</script>";
				echo "<script> 
						location.href ('altera_fun.php?cod_fun=<?php echo $cod_fun; ?>') 
					 </script>";
			}		
		}
	}
?>