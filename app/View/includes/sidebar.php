<?php
	$username = $data->nome;
	$page = $_SERVER['PHP_SELF'];
	//require 'app/Model/Usuario.php';
	$quantidade = Usuario::quantidade($data->email);
?>
<nav class="sidebar">
			<div class="user-image">
				<img src="images/profile-picture.jpg" alt="@<?= $username ?>" title="@<?= $username ?>" draggable="false"> 
			</div>
			<div class="info">
				<h1 class="name">@<?= $username ?></h1>
				<span class="description"><?= $quantidade['albuns'] ?> álbuns - <?= $quantidade['imagens'] ?> fotos</span>
			</div>
			<ul>
				<li><a href="perfil.php?acao=meuperfil">Meu perfil</a></li>
				<li><a href="perfil.php?acao=albuns">Álbuns</a></li>
				<li><a href="#">Amigos</a></li>
				<li><a href="perfil.php?acao=sair">Sair</a></li>
			</ul>
		</nav>
