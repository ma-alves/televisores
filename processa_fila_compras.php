<?php
	$env = parse_ini_file('.env');
    $senha_db = $env["SENHA_DB"];
	$conectar = mysqli_connect ("localhost", "root", $senha_db, "tever");

	$cod_tel = $_GET["cod_tel"];
	
	$sql_altera = "UPDATE televisores 		
				   SET fila_compra_tel = 'S'
				   WHERE cod_tel = '$cod_tel'";

	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert('Televisor colocado na fila de compra com sucesso.') 
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
				O televisor não foi colocado na fila de compras. Tente novamente mais tarde!') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}
?>