<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include "app/View/includes/head.php" ?>
	<title>Meus álbuns - EXPSR</title>
</head>
<body>
	<?php include "app/View/includes/navbar.php" ?>
	<div class="dashboard">
		<?php include "app/View/includes/sidebar.php" ?>
		<div class="dashboard-body">
			<div class="container">
				<div class="page-header">
					<div class="menu-button" onclick="toggleSidebar()">
						<div class="row"></div><div class="row"></div><div class="row"></div>
					</div>
					<h2 class="page-title">Meus álbuns</h2>
					<button class="button align-right">Criar álbum</button>
				</div>
				<div class="albums">
					<?php
						for ($i = 0; $i < 7; $i++) {
					?>

					<div class="album" style="background-image: url('images/background.jpg');">
						<a href="#">
							<div class="album-header">
								<h3 class="album-title">Título do álbum</h3>
								<i class="fas fa-user-friends align-right"></i>
							</div>
							<div class="album-footer">42 fotos</div>
						</a>
					</div>
					
					<div class="album" style="background-image: url('images/imagem-vertical.jpg');">
						<a href="#">
							<div class="album-header">
								<h3 class="album-title">Título do álbum</h3>
								<i class="fas fa-lock align-right"></i>
							</div>
							<div class="album-footer">16 fotos</div>
						</a>
					</div>
					<?php
						}
					?>
				</div>
				<div class="page-footer">
					<ul class="pagination">
						<li><a href="#">Anterior</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">Próxima</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>