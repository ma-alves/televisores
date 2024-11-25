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
			<div class="middle">
            	<?php
					$conectar = mysqli_connect ("localhost", "root", $senha_db, "tever");
					
					$cod_fun = $_GET["cod_fun"];
									
					$sql_consulta = "SELECT nome_fun, cpf_fun, usuario_fun, senha_fun, telefone_fun, 
                    salario_fun, endereco_fun, data_nasc_fun, email_fun, status_fun, funcao_fun, cod_fun
									 FROM funcionarios WHERE cod_fun = '$cod_fun'";

					$resultado_pesquisa = mysqli_query($conectar, $sql_consulta);
					
					$registro = mysqli_fetch_row($resultado_pesquisa);
				?>
                <h1>ALTERAR FUNCIONÁRIO</h1>
				<form method="post" action="processa_altera_fun.php">
					<input type="hidden" name="cod_fun" value="<?php echo $cod_fun; ?>">
					<?php 
						if ($registro[10] == "administrador") 
						{ 
					?>
						<input type="hidden" name="funcao_fun" value="<?php echo $registro[1]; ?>">
							<p>
                                Senha:<input type="password" name="senha_fun" value="<?php echo $registro[3];?>" required>  
							</p>								
					<?php
						} else {
					?>
							<p> 
								Nome: <input type="text" name="nome_fun" value="<?php echo "$registro[0]";?>" required>
							</p>
							<p> 
								Função:  
								<input type="radio" name="funcao_fun" value="estoquista" 
									<?php
										if ($registro[10] == "estoquista") {
											echo "checked";
										}
									?>> Estoquista
								<input type="radio" name="funcao_fun" value="vendedor"
									<?php
										if ($registro[10] == "vendedor") {
											echo "checked";
										}
									?>> Vendedor  
							</p>
							<p> 
								CPF:
								<input type="text" name="cpf_fun" value="<?php echo "$registro[1]";?>" required>
							</p>
							<p> 
								Usuário: 
								<input type="text" name="usuario_fun" value="<?php echo "$registro[2]";?>" required>
							</p>
							<p> 
								Senha: 
								<input type="password" name="senha_fun" value="<?php echo "$registro[3]";?>" required>
							</p>
							<p> 
								Telefone: 
								<input type="text" name="telefone_fun" value="<?php echo "$registro[4]";?>" required>
							</p>
							<p> 
								Salário: 
								<input type="number" name="salario_fun" value="<?php echo "$registro[5]";?>" required>
							</p>
							<p> 
								Endereço: 
								<input type="text" name="endereco_fun" value="<?php echo "$registro[6]";?>" required>
							</p>
							<p> 
								Data de nascimento: 
								<input type="date" name="data_nasc_fun" value="<?php echo "$registro[7]";?>" required>
							</p>
							<p> 
								E-mail: 
								<input type="text" name="email_fun" value="<?php echo "$registro[8]";?>" required>
							</p>
							<p> 
								Status:
								<select name="status_fun">
									<option value="ativo"
										<?php
											if ($registro[4] == "ativo") {
												echo "selected";
											}
										?> > Ativo 
									</option>
									<option value="inativo"<?php
										if ($registro[4] == "inativo") {
											echo "selected";
										}
										?> > Inativo 
									</option>
								</select>
							</p>
					<?php
						}
					?>					
					<p> <input type="submit" value="Alterar Funcionário">  </p>	
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