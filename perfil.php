<?php

// Escode erros NOTICE
error_reporting(E_ERROR | E_WARNING | E_PARSE);

/**
* Cria uma instância do controlador para uso
*/
include_once('app/Controller/Perfil.php');
$controller = new PerfilController();

/**
* Seleciona a rota correta.
*/
switch ($_GET['acao']) {
    case 'meuperfil':
        $controller->meuperfil();
        break;
    case 'albuns':
        $controller->albuns();
        break;
    case 'album':
        $controller->album();
        break;
    case 'upload':
        $controller->upload();
        break;
    case 'sair':
        $controller->sair();
        break;        
}

?>