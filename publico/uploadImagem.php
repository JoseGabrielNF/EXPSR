<?php
							   
if(isset($_FILES['photoToUpload']) && $_FILES["photoToUpload"]["error"] == 0){
							                           
    $target_dir = "EXPSR_DB/Photos/" ."&". $data->email ."&". $_GET['album'] . "&";
    $target_file = $target_dir . basename($_FILES["photoToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Verifica se foto ja existe
    if (file_exists($target_file)) {
       // echo "<p>Foto já está armazenada no perfil.</p>";
        $uploadOk = 0;
    }
    // Verifica tamanho da foto
    if ($_FILES["photoToUpload"]["size"] > 15000000) {
    //echo "<p>Arquivo maior que o tamanho máximo (15MB).</p>";
    $uploadOk = 0;
    }
    // Verifica extensao da foto
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        //echo "<p>Arquivo não é do tipo JPG, JPEG, PNG ou GIF.</p>";
        $uploadOk = 0;
    }
    // Faz upload da imagem se estiver OK
    if ($uploadOk == 0) {
       // echo "<p>Foto não armazenada.</p>";
    } else {
        if (move_uploaded_file($_FILES["photoToUpload"]["tmp_name"], $target_file)) {
            //echo "<p>Foto " . basename( $_FILES["photoToUpload"]["name"]) . " armazenada com sucesso.</p>";
           // echo "<img src='" . $target_file . "' alt='" . $_FILES["photoToUpload"]["name"] . "' align='middle' style='margin:0px 50px'>";
            // Como a imagem passou em todas as validações, abaixo vamos salva-la no banco e relacionarmos com o usuario.
            $imagem = new Imagens($data->email, $target_file, $_GET['album'], $_POST['descricao']);
            $imagem->salvar();
        } else {
            echo "<p>Erro ao armazenar foto, tente novamente.</p>";
        }
    }
}
?>
			