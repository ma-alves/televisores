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
				<h1 style="font-size: 40px;">DADOS DO FUNCIONÁRIO</h1>
				<?php
					$conectar = mysqli_connect("localhost", "root", $senha_db, "tever");
					
                    $cod_fun = $_GET["cod_fun"];

					$sql_consulta = "SELECT nome_fun, cpf_fun, usuario_fun, telefone_fun, 
                    salario_fun, endereco_fun, data_nasc_fun, email_fun, status_fun, funcao_fun, cod_fun
									 FROM funcionarios WHERE cod_fun = $cod_fun";
									 
					$sql_resultado = mysqli_query ($conectar, $sql_consulta);
                    
                    $registro = mysqli_fetch_row($sql_resultado);
					
					echo "<p style='font-size: 20px;'>Nome: $registro[0]</p>";
					echo "<p style='font-size: 20px;'>CPF: $registro[1]</p>";
					echo "<p style='font-size: 20px;'>Usuário: $registro[2]</p>";
					echo "<p style='font-size: 20px;'>Telefone: $registro[3]</p>";
					echo "<p style='font-size: 20px;'>Salário: $registro[4]</p>";
					echo "<p style='font-size: 20px;'>Endereço: $registro[5]</p>";
					echo "<p style='font-size: 20px;'>Data de Nascimento: $registro[6]</p>";
					echo "<p style='font-size: 20px;'>E-mail: $registro[7]</p>";
					echo "<p style='font-size: 20px;'>Status: $registro[8]</p>";
					echo "<p style='font-size: 20px;'>Função: $registro[9]</p>";
				?>
            <hr>
			<footer>
            	<p>QS 07 lote 02/08 | E-mail: contato@teverstore.com.br | Fone: (61) 98000-1000</p>
            	<p>&#169 2024 Tever Store</p>
        	</footer>
		</div>
    </body>
</html>