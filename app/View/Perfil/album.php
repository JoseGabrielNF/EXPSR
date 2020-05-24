<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php 
		include "app/View/includes/head.php";

		if ($_GET['visibilidade'] == 'Público'){
			$visibilidade = 'public';
		}else{
			$visibilidade = 'private';
		}
	
	?>
	<title><?= $_GET['album']?> - EXPSR</title>
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
					<h2 class="page-title"><?= $_GET['album']?></h2><div class="visibility <?= $visibilidade?>"><?= $_GET['visibilidade']?></div>
					<button class="button align-right" onclick="toggleModal()"><i class="far fa-image"></i> Adicionar</button>
				</div>
				<div class="images">
					<?php
					require 'app/Model/Imagens.php';
					$imagem = Imagens::listar($data->email, $_GET['album']);
					
					if ($imagem[0] == 'TEM NADA'){
						$count = 0;
					}else{
						$count = sizeof($imagem);
					}
					
					for ($i = 0; $i < $count; $i++) {
					
					?>

					<div class="image" style="background-image: url('<?= $imagem[$i];?>')">
						<a href="#"></a>
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
			<h1 class="modal-title">Adicionar imagem</h1>
			<form enctype="multipart/form-data" method="post" class="modal-form">
				<input type="file" id="upload-button" name="photoToUpload"/>
				<label for="visibilidade">Visibilidade</label>
				<select name='visisbilidade' id="visibilidade">
					<option value="publico">Público</option>
					<option value="privado">Privado</option>
				</select>
				<label for="descricao">Descrição</label>
				<textarea name="descricao" id="descricao" cols="30" rows="10" maxlength="300" placeholder="Descreva a imagem"></textarea>
				<input action="acao=imagens&album=<?= $_GET['album']?>" type="submit" value="Adicionar imagem"/>
			</form>
			<?php include('uploadImagem.php');
			//echo "<meta http-equiv='refresh' content='0'>"; ?>

		</div>
	</div>
</body>
</html>