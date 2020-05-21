<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "app/View/includes/head.php" ?>
	<title>Meu perfil - EXPSR</title>
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
					<h2 class="page-title">Meu perfil</h2>
					<!-- O código abaixo está comentado
						<?php
						require 'app/Model/Imagens.php';
						$imagem = Imagens::listar($data->email);
					?>-->	
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>