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
				<h1 style="font-size: 40px;">RELATÓRIO DE FUNCIONÁRIOS ATIVOS</h1>
				<?php
					$conectar = mysqli_connect("localhost", "root", $senha_db, "tever");
					
					$sql_consulta = "SELECT nome_fun,  salario_fun, 
                                        status_fun, funcao_fun, cod_fun
									 FROM funcionarios WHERE status_fun = 'ativo'";
									 
					$sql_resultado = mysqli_query ($conectar, $sql_consulta);				 
				?>
				<table width="100%">
							<tr height="50px">
								<td><strong>NOME</strong></td>
								<td><strong>SALÁRIO</strong></td>
								<td><strong>FUNÇÃO</strong></td>
								<td><strong>STATUS</strong></td>
							</tr>
					<?php
						while ($registro = mysqli_fetch_row($sql_resultado)) {
					?>
							<tr height="50px">
								<td>
									<a href="exibe_fun.php?cod_fun=<?php echo $registro[4]; ?>">
										<?php echo $registro[0]; ?>
									</a>	
								</td>
								<td>
									R$<?php echo $registro[1]; ?>
								</td>
								<td>
									<?php echo $registro[3]; ?>
								</td>
								<td>
									<?php echo $registro[2]; ?>
								</td>
							</tr>
					<?php		
						}
					?>
				</table>
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