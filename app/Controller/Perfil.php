<?php 

require 'Controlador.php';
require 'app/Model/Usuario.php'; 

class PerfilController extends Controller  {
    
    /**
    * @var Usuario armazena o usuário logado no momento.
    */
    private $loggedUser;
    
    function __construct() {
        session_start();
        if (isset($_SESSION['user'])) $this->loggedUser = $_SESSION['user'];
    }
    
    public function meuperfil() {
        // Passamos $this->loggedUser assim podemos utilizar essa variavel no HTML
        $this->view('Perfil/meuperfil', $this->loggedUser);
    }

    public function albuns() {
        $this->view('Perfil/albuns', $this->loggedUser);  
    }

    public function album() {
        $this->view('Perfil/album', $this->loggedUser);
    }

    public function amigos() {
        $this->view('Perfil/amigos', $this->loggedUser);  
    }

    public function upload() {
        $this->view('Perfil/upload', $this->loggedUser);
    }

    public function sair() {
        session_destroy();
        header('Location: index.php?mensagem=Usuário deslogado com sucesso!');  
    }
}

?>