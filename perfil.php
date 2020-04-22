<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<title>Meu perfil - EXPSR</title>
</head>
<body>
	<div class="dashboard">
		<nav class="side-menu">
			<div class="user-image">
				<img src="images/profile-picture.jpg" alt="@fulanodasilva" title="@fulanodasilva" draggable="false">
			</div>
			<div class="info">
				<h1 class="name">@fulanodasilva</h1>
				<span class="description">5 álbuns - 47 fotos</span>
			</div>
			<ul>
				<li><a href="#">Meu perfil</a></li>
				<li><a href="upload.php">Upload</a></li>
				<li class="active"><a href="#">Álbuns</a></li>
				<li><a href="#">Amigos</a></li>
				<li><a href="index.php">Sair</a></li>
			</ul>
		</nav>
		<div class="body">
			<div class="container">
				<div class="page-header">
					<h2 class="page-title">Álbuns</h2>
					<button class="button align-right">Criar álbum</button>
				</div>
				<div class="albums">
					<?php
						for ($i = 0; $i < 7; $i++) {
					?>
		
					<div class="album">
						<div class="album-header">
							<h3 class="album-title">Título do álbum</h3>
							<i class="fas fa-user-friends align-right"></i>
						</div>
						<div class="album-image">
							<img src="images/background.jpg" alt="Título do álbum" title="Título do álbum">
						</div>
						<div class="album-footer">42 fotos</div>
					</div>

					<div class="album">
						<div class="album-header">
							<h3 class="album-title">Título do álbum</h3>
							<i class="fas fa-lock align-right"></i>
						</div>
						<div class="album-image">
							<img src="images/imagem-vertical.jpg" alt="Título do álbum" title="Título do álbum">
						</div>
						<div class="album-footer">16 fotos</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>