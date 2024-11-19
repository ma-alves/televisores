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
			<div class="middle-list">
				<h1 style="font-size: 40px;">FUNCIONÁRIOS</h1>
                <p align="right"><a href="cadastra_fun.php">Cadastro de funcionários</a></p>
				<?php
					$conectar = mysqli_connect("localhost", "root", "#senai0308", "televisores");
					
					$sql_consulta = "SELECT nome_fun, cpf_fun, usuario_fun, telefone_fun, 
                    salario_fun, endereco_fun, data_nasc_fun, email_fun, status_fun, funcao_fun, cod_fun
									 FROM funcionarios";
									 
					$sql_resultado = mysqli_query ($conectar, $sql_consulta);				 
				?>
				<table width="100%">
							<tr height="50px">
								<td>NOME</td>
								<td>CPF</td>
								<td>USUÁRIO</td>
								<td>TELEFONE</td>
								<td>SALÁRIO</td>
								<td>ENDEREÇO</td>
								<td>NASCIMENTO</td>
								<td>E-MAIL</td>
								<td>STATUS</td>
								<td>FUNÇÃO</td>
								<td>AÇÃO</td>
							</tr>
					<?php
						while ($registro = mysqli_fetch_row($sql_resultado)) {
					?>
							<tr height="50px">
								<td>
									<a href="exibe_fun.php?codigo=<?php echo $registro[10]; ?>">
										<?php echo $registro[0]; ?>
									</a>	
								</td>
								<td>
									<?php echo $registro[1]; ?>
								</td>
								<td>
									<?php echo $registro[2]; ?>
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
									<?php echo $registro[7]; ?>
								</td>
								<td>
									<?php echo $registro[8]; ?>
								</td>
								<td>
									<?php echo $registro[9]; ?>
								</td>
								<td>
									<a href="altera_fun.php?codigo=<?php echo $registro[10]; ?>">
										Alterar
									</a>
								</td>
							</tr>
					<?php		
						}
					?>
				</table>
			</div>
            <hr>
			<footer>
            	<p>QS 07 lote 02/08 | E-mail: contato@teverstore.com.br | Fone: (61) 98000-1000</p>
            	<p>&#169 2024 Tever Store</p>
        	</footer>
		</div>
    </body>
</html>