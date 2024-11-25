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
    $cod_tel = $_POST["cod_tel"];
    $vendas_cod_venda = $_POST["vendas_cod_venda"];
	
    $sql_altera = "UPDATE televisores 		
                    SET
	                    marca_tel = '$marca_tel',
                        modelo_tel = '$modelo_tel',
	                    preco_tel = '$preco_tel',
	                    resolucao_tel = '$resolucao_tel',
	                    conectividade_tel = '$conectividade_tel',
	                    streaming_tel = '$streaming_tel',
	                    fila_compra_tel = '$fila_compra_tel',
                        vendas_cod_venda = '$vendas_cod_venda'
                    WHERE cod_tel = '$cod_tel'";
							  
	$sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
	if ($sql_resultado_alteracao == true) {
		echo "<script>
				alert('Televisor alterado com sucesso')
			  </script>";
		echo "<script> 
				 location.href = ('lista_tel.php') 
			  </script>";
		exit();
	} else {
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Tente novamente.') 
			</script>";
		echo "<script> 
				location.href ('altera_tel.php?cod_tel=<?php echo $cod_tel; ?>') 
			 </script>";
	}
?>