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
				<h1 style="font-size: 40px;">FILA DE COMPRAS</h1>
				<?php
					$conectar = mysqli_connect("localhost", "root", $senha_db, "tever");
					
					$sql_consulta = "SELECT marca_tel, modelo_tel, preco_tel, resolucao_tel, 
                    conectividade_tel, streaming_tel, fila_compra_tel, cod_tel FROM televisores
                    WHERE fila_compra_tel = 'S'";
									 
					$sql_resultado = mysqli_query ($conectar, $sql_consulta);				 
				?>
				<table width="100%">
					<tr height="50px">
						<td><strong>MARCA</strong></td>
						<td><strong>MODELO</strong></td>
						<td><strong>PREÇO</strong></td>
						<td><strong>RESOLUÇÃO</strong></td>
						<td><strong>CONECTIVIDADE</strong></td>
						<td><strong>STREAMING</strong></td>
						<td><strong>NA FILA</strong></td>
					</tr>
					<?php
                    $valor_total = 0;
						while ($registro = mysqli_fetch_row($sql_resultado)) {
					?>
							<tr height="50px">
								<td>
									<?php echo $registro[0]; ?>
								</td>
								<td>
									<a href="exibe_tel.php?cod_tel=<?php echo $registro[7]; ?>">
										<?php echo $registro[1]; ?>
									</a>	
								</td>
								<td>
									R$<?php echo $registro[2]; $valor_total = $valor_total + $registro[2]; ?>
								</td>
								<td>
									<?php echo $registro[3]; ?>
								</td>
								<td>
									<?php echo $registro[4]; ?>
								</td>
								<td>
									<?php echo $registro[5]; ?>
								</td>
								<td>
									<?php echo $registro[6]; ?>
								</td>
                                <td>
							        <a href="processa_retira_fila_compras.php?cod_tel=<?php echo $registro[7]?>">
								    Retirar da fila de compras
							        </a>
						        </td>
							</tr>
					<?php		
						}
					?>
				</table>
                <p><strong>Total: R$<?php echo $valor_total; ?></strong></p>
				<p><a href="vendas.php">Voltar a seleção de televisores</a></p>
				<p><a href="recibo_venda.php">Finalizar venda</a></p>
			</div>
            <hr>
			<footer>
            	<p>QS 07 lote 02/08 | E-mail: contato@teverstore.com.br | Fone: (61) 98000-1000</p>
            	<p>&#169 2024 Tever Store</p>
        	</footer>
		</div>
    </body>
</html>