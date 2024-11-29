<?php
	session_start ();
    $env = parse_ini_file('.env');
    $senha_db = $env["SENHA_DB"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tever Store</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Outfit">
		<style> #principal {font-family: 'Outfit', serif;} </style>
    </head>
    <body>
        <div id="principal">
            <div class="header">
				<h1>Tever Store</h1>
			</div>
            <hr>
			<div class="menu_global">
                <p align="center"> Olá, <?php include "valida_login.php"; ?>!</p>
                <?php include "menu_local.php"; ?>
			</div>
			<div class="middle">
                <?php
					$conectar = mysqli_connect ("localhost", "root", $senha_db, "tever");
					
					$cod_tel = $_GET["cod_tel"];
									
					$sql_consulta = "SELECT 
                                        marca_tel,
                                        modelo_tel,
                                        preco_tel,
                                        resolucao_tel,
                                        conectividade_tel,
                                        streaming_tel,
                                        fila_compra_tel,
                                        vendas_cod_venda
									 FROM televisores 
                                     WHERE cod_tel = '$cod_tel'";

					$resultado_pesquisa = mysqli_query($conectar, $sql_consulta);
					
					$registro = mysqli_fetch_row($resultado_pesquisa);
				?>
                <h1>ALTERAR TELEVISOR</h1>
				<form method="post" action="processa_altera_tel.php">
					<input type="hidden" name="cod_tel" value="<?php echo $cod_tel; ?>">
						<p> 
							Marca: <input type="text" name="marca_tel" value="<?php echo "$registro[0]";?>" required>
						</p>
						<p> 
							Modelo:
							<input type="text" name="modelo_tel" value="<?php echo "$registro[1]";?>" required>
						</p>
						<p> 
							Preço: 
							<input type="number" name="preco_tel" value="<?php echo "$registro[2]";?>" required>
						</p>
						<p> 
							Resolução: 
							<input type="text" name="resolucao_tel" value="<?php echo "$registro[3]";?>" required>
						</p>
						<p> 
							Conectividade: 
							<input type="text" name="conectividade_tel" value="<?php echo "$registro[4]";?>" required>
						</p>
						<p> 
							Streaming:
                            <input type="radio" name="streaming_tel" value="S" checked>Sim
                            <input type="radio" name="streaming_tel" value="N">Não
						</p>
						<p> 
							Na fila de compras:
                            <input type="radio" name="fila_compra_tel" value="S" checked>Sim
                            <input type="radio" name="fila_compra_tel" value="N">Não 
						</p>
						<p> 
							Código de Venda: 
							<input type="number" name="vendas_cod_venda" value="<?php echo "$registro[7]";?>" required>
						</p>			
					<p><input type="submit" value="Alterar Televisor"></p>	
				</form>
			</div>
            <hr>
			<footer>
            	<p>QS 07 lote 02/08 | E-mail: contato@teverstore.com.br | Fone: (61) 98000-1000</p>
            	<p>&#169 2024 Tever Store</p>
        	</footer>
		</div>
    </body>
</html>