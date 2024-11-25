<?php
	session_start ();
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
                <form method="post" action="processa_cadastra_tel.php">
					<table>	
						<tr>
							<td><p>Marca: </p></td>
							<td><p> <input type="text" name="marca_tel" required> </p></td>
						</tr>
						<tr>
							<td><p>Modelo: </p></td>
							<td><p> <input type="text" name="modelo_tel" required> </p></td>
						</tr>
						<tr>
							<td><p>Preço: </p></td>
							<td><p> <input type="number" name="preco_tel" required> </p></td>
						</tr>
						<tr>
							<td><p>Resolução: </p></td>
							<td><p> <input type="text" name="resolucao_tel" required> </p></td>
						</tr>
						<tr>
							<td><p>Conectividade: </p></td>
							<td><p> <input type="text" name="conectividade_tel" required> </p></td>
						</tr>
						<tr>
							<td><p>Streaming: </p></td>
                            <td>
                                <p>
                                    <input type="radio" name="streaming_tel" value="s" checked>Sim
                                    <input type="radio" name="streaming_tel" value="n">Não
                                </p>
                            </td>
						</tr>
						<tr>
							<td><p>Na fila de compras: </p></td>
                            <td>
                                <p> 
                                    <input type="radio" name="fila_compra_tel" value="s" checked>Sim
                                    <input type="radio" name="fila_compra_tel" value="n">Não
                                </p>
                            </td>
						</tr>
						<tr>
							<td colspan="2">
							<p><input type="submit" value="Cadastrar Televisor"></p>
							</td>
						</tr>
					</table>
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