<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<title>Entrar - EXPSR</title>
</head>
<body >
	<nav id="nav" class="menu">
		<div class="container">
			<div class="logo">
				<a href="index.php">EXPSR</a>
			</div>
			<ul>
				<li class="alt align-right"><a href="index.php?acao=cadastrar">Criar conta</a></li>
			</ul>
		</div>
	</nav>
	<div class="body auth-background">
		<div class="container">
			<div class="form-container">
				<!--Metodo post é para enviar ao servidor-->
				<!--required: deve preencher o campo-->
				<form method="post" class="auth-form"> 
					<h1>Entrar</h1> 
					<label for="email">Endereço de email</label>
					<input required="required" type="text" name="email" id="email" placeholder="Insira seu email" />
					<label for="senha">Senha</label>
					<input required="required" type="password" name="senha" id="senha" placeholder="Insira sua senha"/>
					<input class="login" type="submit" value="Entrar"/>
				</form>
			</div>
		</div>
	</div>
</body>
</html>