<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "app/View/includes/head.php" ?>
	<title>Upload - EXPSR</title>
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
					<h2 class="page-title">Enviar imagem</h2>
                </div>
                <div class="upload-photo">
                    <form enctype="multipart/form-data" action="upload.php" method="POST">
                        Enviar esse arquivo (Max 15MB): <input type="file" name="photoToUpload"/>
                        <input type="submit" value=" Enviar arquivo " />
                    </form>
                    <?php
                        if(isset($_FILES['photoToUpload']) && $_FILES["photoToUpload"]["error"] == 0)
                        {
                            echo "<p>name: " . $_FILES["photoToUpload"]["name"] . "</p>";
                            echo "<p>type: " . $_FILES["photoToUpload"]["type"] . "</p>";
                            echo "<p>size: " . $_FILES["photoToUpload"]["size"] . "</p>";
                            echo "<p>tmp_name: " . $_FILES["photoToUpload"]["tmp_name"] . "</p>";
                            echo "<p>error: " . $_FILES["photoToUpload"]["error"] . "</p>";
                            
                            $target_dir = "EXPSR_DB/Photos/";
                            $target_file = $target_dir . basename($_FILES["photoToUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            // Verifica se foto ja existe
                            if (file_exists($target_file)) {
                                echo "<p>Foto já está armazenada no perfil.</p>";
                                $uploadOk = 0;
                            }

                            // Verifica tamanho da foto
                            if ($_FILES["photoToUpload"]["size"] > 15000000) {
                                echo "<p>Arquivo maior que o tamanho máximo (15MB).</p>";
                                $uploadOk = 0;
                            }

                            // Verifica extensao da foto
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "<p>Arquivo não é do tipo JPG, JPEG, PNG ou GIF.</p>";
                                $uploadOk = 0;
                            }

                            // Faz upload da imagem se estiver OK
                            if ($uploadOk == 0) {
                                echo "<p>Foto não armazenada.</p>";
                            } else {
                                if (move_uploaded_file($_FILES["photoToUpload"]["tmp_name"], $target_file)) {
                                    echo "<p>Foto " . basename( $_FILES["photoToUpload"]["name"]) . " armazenada com sucesso.</p>";
                                    echo "<img src='" . $target_file . "' alt='" . $_FILES["photoToUpload"]["name"] . "' align='middle' style='margin:0px 50px'>";
                                } else {
                                    echo "<p>Erro ao armazenar foto, tente novamente.</p>";
                                }
                            }
                        }
                    ?>
                </div>
			</div>
		</div>
	</div>
</body>
</html>