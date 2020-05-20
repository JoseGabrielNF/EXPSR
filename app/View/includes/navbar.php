<?php
	$page = $_SERVER['PHP_SELF'];
?>
<nav class="menu">
		<div class="container">
			<div class="logo">
				<a href="index.php">EXPSR</a>
			</div>
			<ul>
				<?php if ($page == 'index.php') { ?>
				<li><a href="#sobre">Sobre nós</a></li>
				<li><a href="#planos">Planos</a></li>
				<li class="alt align-right"><a href="index.php?acao=login">Entrar</a></li>
				<li class="alt"><a href="index.php?acao=cadastrar">Criar conta</a></li>
				<?php } else { ?>
				<li class="align-right"><a href="perfil.php?acao=meuperfil">Minha conta</a></li>
				<?php } ?>
			</ul>
		</div>
	</nav>