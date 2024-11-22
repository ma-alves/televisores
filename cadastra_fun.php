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
                <form method="post" action="processa_cadastra_fun.php">
					<table>	
						<tr>
							<td><p>Nome: </p></td>
							<td><p> <input type="text" name="nome_fun" required> </p></td>
						</tr>
						<tr>
							<td><p>CPF: </p></td>
							<td><p> <input type="text" name="cpf_fun" required> </p></td>
						</tr>
						<tr>
							<td><p>Usuário: </p></td>
							<td><p> <input type="text" name="usuario_fun" required> </p></td>
						</tr>
						<tr>
							<td><p>Senha: </p></td>
							<td><p> <input type="text" name="senha_fun" required> </p></td>
						</tr>
						<tr>
							<td><p>Telefone: </p></td>
							<td><p> <input type="text" name="telefone_fun" required> </p></td>
						</tr>
						<tr>
							<td><p>Salário: </p></td>
							<td><p> <input type="number" name="salario_fun" required> </p></td>
						</tr>
						<tr>
							<td><p>Endereço: </p></td>
							<td><p> <input type="text" name="endereco_fun" required> </p></td>
						</tr>
						<tr>
							<td><p>Data de Nascimento: </p></td>
							<td><p> <input type="date" name="data_nasc_fun" required> </p></td>
						</tr>
						<tr>
							<td><p>E-mail: </p></td>
							<td><p> <input type="text" name="email_fun" required> </p></td>
						</tr>
						<tr>
                        <td><p>Status: </p></td>
							<td>
								<p> 
									<input type="radio" name="status_fun" value="ativo" checked>Ativo
									<input type="radio" name="status_fun" value="nao_ativo">Não Ativo
                                </p>
							</td>
						</tr>
						<tr>
							<td><p>Função: </p></td>
							<td>
								<p> 
									<input type="radio" name="funcao_fun" value="estoquista" checked>Estoquista
									<input type="radio" name="funcao_fun" value="vendedor">Vendedor
                                </p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
							<p><input type="submit" value="Cadastrar Funcionário"></p>
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