<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<title>Cadastro - EXPSR</title>
</head>
<body >
	<nav id="nav" class="menu">
		<div class="container">
			<div class="logo">
				<a href="index.php">EXPSR</a>
			</div>
			<ul>
				<li><a href="index.php">Início</a></li>
				<li><a href="#sobre">Sobre nós</a></li>
				<li><a href="#planos">Planos</a></li>
				<li class="push alt"><a href="cadastro.php">Deseja criar uma conta?</a></li>
			</ul>
		</div>
	</nav>
	<div class="body">
		<section class="backgroundLogin">
			<div class="login">
				<!--Metodo post é para enviar ao servidor-->
				<!--required: deve preencher o campo-->
			 <form method="post"> 
					<h1>Faça seu Login</h1> 
					<p> 
						<h1 class="nomeInput">Usuário:</h1>
						<input required="required" type="text" name="usuario" placeholder="Insira seu nome de usuário" />
					</p>
					<p>
						<h1 class="nomeInput">Senha:</h1>
						<input required="required" type="password" name="senha" placeholder="Insira sua senha"/>
					</p>
					<p> 
						<input class="login" type="submit" value="Entrar"/> 
					</p>
					<?php
						echo "Usuário: " . $_POST["usuario"] . "<br>";
						echo "Senha: " . $_POST["senha"] . "<br>";
					?>
				</form>   
			<div>
		</section>
	</div>
</body> 

</html>