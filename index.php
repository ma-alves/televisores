<!DOCTYPE html>
<html lang="pt-br">
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
			<div id="middle">
				<h1>ACESSO À ÁREA RESTRITA</h1>
				<form method="post" action="processa_login.php">
					<p>
						Login: <br>
						<input type="text" name="login" required>
					</p>
					<p>
						Senha: <br>
						<input type="password" name="senha" required>
					</p>
					<p>
						<input type="submit" value="Entrar">
					</p>
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