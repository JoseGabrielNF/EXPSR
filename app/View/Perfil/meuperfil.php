<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<title>Meus álbuns - EXPSR</title>
</head>
<body>
	<div class="dashboard">
		<nav class="side-menu">
			<div class="user-image">
				<img src="images/profile-picture.jpg" alt="@fulanodasilva" title="@fulanodasilva" draggable="false">
			</div>
			<div class="info">
                <h1 class="name">@<?= $data->nome;?></h1>

				<span class="description">5 álbuns - 47 fotos</span>
			</div>
			<ul>
				<li class="active"><a href="perfil.php?acao=meuperfil">Meu perfil</a></li>
				<li><a href="perfil.php?acao=upload">Upload</a></li>
				<li><a href="perfil.php?acao=albuns">Álbuns</a></li>
				<li><a href="#">Amigos</a></li>
				<li><a href="perfil.php?acao=sair">Sair</a></li>
			</ul>
		</nav>
		<div class="dashboard-body">
			<div class="container">
				<div class="page-header">
					<h2 class="page-title">Meu Perfil Bolado</h2>
					<button class="button align-right">Botão</button>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>