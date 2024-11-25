<?php
    $env = parse_ini_file('.env');
    $senha_db = $env["SENHA_DB"];

	$conectar = mysqli_connect ("localhost", "root", $senha_db, "tever");
	
	$marca_tel = $_POST["marca_tel"];
    $modelo_tel = $_POST["modelo_tel"];
	$preco_tel = $_POST["preco_tel"];
	$resolucao_tel = $_POST["resolucao_tel"];
	$conectividade_tel = $_POST["conectividade_tel"];
	$streaming_tel = $_POST["streaming_tel"];
	$fila_compra_tel = $_POST["fila_compra_tel"];	
	
	$sql_cadastrar = "INSERT INTO televisores 
                        (marca_tel,
                        modelo_tel,
                        preco_tel,
                        resolucao_tel,
                        conectividade_tel,
                        streaming_tel,
                        fila_compra_tel,
                        vendas_cod_venda)
					  VALUES 
                        ('$marca_tel',
                        '$modelo_tel',
                        '$preco_tel',
                        '$resolucao_tel',
                        '$conectividade_tel',
                        '$streaming_tel',
                        '$fila_compra_tel',
                        1)";

	$resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
	
	if ($resultado_cadastrar == true) { 		
		echo "<script> 
				alert ('Cadastro feito com sucesso.') 
			  </script>";
		
		echo "<script> 
				location.href = ('cadastra_tel.php') 
			  </script>";	
	}
	else { 		
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Tente novamente.')
		     </script>";
		echo "<script> 
				location.href = ('cadastra_tel.php') 
			  </script>";		
	}	
?>