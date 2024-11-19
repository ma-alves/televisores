<?php
	if ( isset($_SESSION["nome_fun"]) ) {
		echo $_SESSION["nome_fun"];
	}
	else {
		echo "<script> 
				alert('Acesso negado! É preciso estar logado para acessar esta página.')
			  </script>";
		echo "<script> 
				location.href = ('index.php') 
			  </script>";
	}
?>