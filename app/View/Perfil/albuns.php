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
					<h2 class="page-title">Meus álbuns</h2>
					<button class="button align-right" onclick="toggleModal()"><i class="far fa-images"></i> Criar</button>
				</div>
				<div class="albums">
					<?php
					require 'app/Model/Imagens.php';
					$imagem = Imagens::listar($data->email);
					
					for ($i = 0; $i < sizeof($imagem); $i++) {
					
					?>

					<div class="album" style="background-image: url('<?= $imagem[$i]?>');">
						<a href="#">
							<div class="album-header">
								<h3 class="album-title">Título do álbum</h3>
								<i class="fas fa-user-friends align-right"></i>
							</div>
							<div class="album-footer">42 fotos</div>
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
	<div class="modal-background">
		<div class="modal">
			<h1 class="modal-title">Criar álbum</h1>
			<form action="" class="modal-form">
				<label for="titulo">Título do álbum</label>
				<input type="text" id="titulo">
				<label for="visibilidade">Visibilidade</label>
				<select id="visibilidade">
					<option value="publico">Público</option>
					<option value="privado">Privado</option>
				</select>
				<input type="submit" value="Criar álbum">
			</form>
		</div>
	</div>
</body>
</html>