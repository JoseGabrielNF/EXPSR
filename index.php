<?php

// Escode erros NOTICE
error_reporting(E_ERROR | E_WARNING | E_PARSE);


/**
* Conecta ao banco e cria o schema (tabela Usuários)
*/
include_once('app/Model/Banco.php');
Banco::createSchema();

/**
* Cria uma instância do controlador para uso
*/
include_once('app/Controller/LoginCadastro.php');
$controller = new LoginCadastroController();

/**
* Seleciona a rota correta.
*/
switch ($_GET['acao']) {
    case 'cadastrar':
        $controller->cadastrar();
        break;
    case 'login':
        $controller->login();
        break;
    default:
        $controller->paginaInicial();
}

?>