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
				<h1 style="font-size: 40px;">RECIBO</h1>
				<?php
					$conectar = mysqli_connect("localhost", "root", $senha_db, "tever");

                    $data_venda = date('d/m/Y');
                    $cod_fun = $_SESSION['cod_fun'];
                    $sql_registro_venda = "INSERT INTO vendas
                                            (data_venda, funcionarios_cod_fun)
                                            VALUES ('$data_venda','$cod_fun')";

                    $resultado_registro_venda = mysqli_query ($conectar, $sql_registro_venda);

                    $sql_consulta_ultima_venda = "SELECT cod_venda
                    FROM vendas ORDER BY cod_venda DESC LIMIT 1";
                    $resultado_consulta = mysqli_query($conectar, $sql_consulta_ultima_venda);
                    $registro_cod_venda = mysqli_fetch_row($resultado_consulta);

                    $sql_codigo_venda_em_tel = "UPDATE televisores
                                                SET vendas_cod_venda = '$registro_cod_venda[0]',
                                                fila_compra_tel = 'S'
                                                WHERE fila_compra_tel = 'S'";
                                
                    $resultado_alteracao_tel = mysqli_query ($conectar, $sql_codigo_venda_em_tel);

					$sql_consulta_recibo = "SELECT marca_tel, modelo_tel, preco_tel, resolucao_tel, 
                    conectividade_tel, streaming_tel, fila_compra_tel, cod_tel FROM televisores
                    WHERE vendas_cod_venda = $registro_cod_venda[0]";

                    $resultado_consulta = mysqli_query($conectar, $sql_consulta_recibo);						
                    echo "<p>Venda nº: $registro_cod_venda[0]</p>";
                    echo "<p>Data: $data_venda</p>";
				?>
				<table width="100%">
					<tr height="50px">
						<td><strong>MARCA</strong></td>
						<td><strong>MODELO</strong></td>
						<td><strong>PREÇO</strong></td>
					</tr>
					<?php
                        $valor_total = 0;
						while ($registro = mysqli_fetch_row($resultado_consulta)) {
					?>
							<tr height="50px">
								<td>
									<?php echo $registro[0]; ?>
								</td>
								<td>
									<?php echo $registro[1]; ?>
								</td>
								<td>
									R$<?php echo $registro[2]; 
                                    $valor_total = $valor_total + $registro[2]; ?>
								</td>
							</tr>
					<?php		
						}
					?>
				</table>
                <p>Total: R$<?php echo $valor_total; ?></p>
                <p><a href="vendas.php">Fechar recibo</a></p>
			</div>
            <hr>
			<footer>
            	<p>QS 07 lote 02/08 | E-mail: contato@teverstore.com.br | Fone: (61) 98000-1000</p>
            	<p>&#169 2024 Tever Store</p>
        	</footer>
		</div>
    </body>
</html>