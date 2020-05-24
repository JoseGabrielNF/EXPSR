<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include "app/View/includes/head.php"; 
		require 'app/Model/Albuns.php';?>
	<title>Meus álbuns - EXPSR</title>
	<script>
		if ( window.history.replaceState ) {
  			window.history.replaceState( null, null, window.location.href );
		}
	</script>
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
					$album = Albuns::listar($data->email);

					if ($album[0] == 'TEM NADA'){
						$count = 0;
					}else{
						$count = sizeof($album);
					}
					
					for ($i = 0; $i < $count; $i++) {
						$quantidade = Albuns::quantidade($data->email, $album[$i]->nomeAlbum);
						//$capa =  Albuns::capaAlbum($data->email, $album[$i]->nomeAlbum);
						//echo $capa[$i];
						//echo $quantidade['caminho'][0];
						//echo $quantidade['fotos'];
					?>

					<div class="album" style="background-image: url('<?= $quantidade['caminho'][0]?>');">
						<a href="perfil.php?acao=imagens&album=<?= $album[$i]->nomeAlbum?>&visibilidade=<?= $album[$i]->visibilidade?>">
							<div class="album-header">
								<h3 class="album-title"><?= $album[$i]->nomeAlbum?></h3>
								<i class="fas fa-user-friends align-right"></i>
							</div>
							<div class="album-footer"><?=$quantidade['fotos']?> fotos</div>
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
			<form method="post" href="perfil.php?acao=albuns" class="modal-form">
				<label for="titulo">Título do álbum</label>
				<input name='nome' type="text" id="titulo">
				<label for="visibilidade">Visibilidade</label>
				<select name='visibilidade' id="visibilidade">
					<option value="Público">Público</option>
					<option value="Privado">Privado</option>
				</select>
				<input type="submit" value="Criar álbum">
			</form>
		</div>
	</div>	
</body>
</html>

