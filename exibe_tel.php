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
			<div class="middle-list">
				<h1 style="font-size: 40px;">DADOS DO TELEVISOR</h1>
				<?php
					$conectar = mysqli_connect("localhost", "root", $senha_db, "tever");
					
                    $cod_tel = $_GET["cod_tel"];

					$sql_consulta = "SELECT marca_tel, modelo_tel, preco_tel, resolucao_tel, 
                    conectividade_tel, streaming_tel, fila_compra_tel, cod_tel FROM televisores";
									 
					$sql_resultado = mysqli_query ($conectar, $sql_consulta);
                    
                    $registro = mysqli_fetch_row($sql_resultado);
					
					echo "<p style='font-size: 20px;'>Marca: $registro[0]</p>";
					echo "<p style='font-size: 20px;'>Modelo: $registro[1]</p>";
					echo "<p style='font-size: 20px;'>Preço: $registro[2]</p>";
					echo "<p style='font-size: 20px;'>Resolução: $registro[3]</p>";
					echo "<p style='font-size: 20px;'>Conectividade: $registro[4]</p>";
					echo "<p style='font-size: 20px;'>Streaming: $registro[5]</p>";
					echo "<p style='font-size: 20px;'>Na fila de compras: $registro[6]</p>";
				?>
            <hr>
			<footer>
            	<p>QS 07 lote 02/08 | E-mail: contato@teverstore.com.br | Fone: (61) 98000-1000</p>
            	<p>&#169 2024 Tever Store</p>
        	</footer>
		</div>
    </body>
</html>