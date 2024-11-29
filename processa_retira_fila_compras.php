<?php	
	$env = parse_ini_file('.env');
    $senha_db = $env["SENHA_DB"];
    $conectar = mysqli_connect ("localhost", "root", $senha_db, "tever");	
	
    $cod_tel = $_GET["cod_tel"];	
	
	$sql_altera = "UPDATE televisores 		
				   SET fila_compra_tel = 'N'
				   WHERE cod_tel = '$cod_tel'";

	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('Televisor retirado da fila de compra com sucesso.') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. 
			O televisor não foi retirado da fila de compras. Tente novamente.') 
			</script>";
		echo "<script> 
				location.href ('ver_fila_compra.php?cod_tel=$cod_tel) 
			 </script>";
	}
?>