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
				<h1 style="font-size: 40px;">RELATÓRIO DE TOTAL DE VENDAS</h1>
				<?php
					$conectar = mysqli_connect("localhost", "root", $senha_db, "tever");

                    $data = date('d/m/Y');
					
					$sql_consulta_total_de_vendas = "SELECT preco_tel FROM televisores 
                                                     WHERE fila_compra_tel = 'S'";
									 
					$sql_resultado = mysqli_query ($conectar, $sql_consulta_total_de_vendas);

                    $valor_total = 0;
                    while ($registro_total_vendas = mysqli_fetch_row ($sql_resultado)) {
						$valor_total = $valor_total + $registro_total_vendas[0];
					}
				?>
                <p style="font-size: 30px;">Total de vendas até hoje: R$<?php echo $valor_total; ?>
                <p><a href="relatorios.php">Voltar</a></p>
			</div>
            <hr>
			<footer>
            	<p>QS 07 lote 02/08 | E-mail: contato@teverstore.com.br | Fone: (61) 98000-1000</p>
            	<p>&#169 2024 Tever Store</p>
        	</footer>
		</div>
    </body>
</html>