<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<title>Criar conta - EXPSR</title>
</head>
<body >
	<nav id="nav" class="menu">
		<div class="container">
			<div class="logo">
				<a href="index.php">EXPSR</a>
			</div>
			<ul>
				<li class="alt align-right"><a href="index.php?acao=login">Entrar</a></li>
			</ul>
		</div>
	</nav>
	<div class="body auth-background">
		<div class="container">
			<div class="form-container">
				<!--Metodo post é para enviar ao servidor-->
				<!--required: deve preencher o campo-->
			 	<form method="post" class="auth-form"> 
					<h1>Criar conta</h1>
					<label for="nome">Nome de usuário</label>
					<input required="required" type="text" id="nome" name="nome" placeholder="Insira um nome de usuário" />
					<label for="email">Endereço de email</label>
					<input required="required" type="email" id="email" name="email" placeholder="Insira seu e-mail" type="email"/> 
					<label for="senha">Senha</label>
					<input required="required" type="password" id="senha" name="senha" placeholder="Insira sua senha"/>
					<label for="senha2">Repetir senha</label>
					<input required="required" type="password" id="senha2" name="senha2" placeholder="Repita sua senha"/>
					<input type="submit" value="Criar Conta"/>
					<p class="termo">Ao criar uma conta você concorda com os termos e condições disponíveis <a href="terms.html">aqui</a>.</p>
				</form>   
			<div>
		</div>
	</div>
</body>
</html>