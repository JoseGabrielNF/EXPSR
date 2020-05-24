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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $album = new Albuns($this->loggedUser->email ,$_POST['nome'], $_POST['visibilidade']);
            $album->salvar(); 

            if ($this->loggedUser) {
                header('Location: perfil.php?acao=imagens&album=' . $_POST['nome'] .'&visibilidade='. $_POST['visibilidade']); 
            }            
           
        }     
    }

    public function album() {
        $this->view('Perfil/album', $this->loggedUser);
        /*
        if(isset($_POST['submit'])){
           // header("Refresh: 5");
            //echo "<meta http-equiv='refresh' content='5'>";
            unset($_POST);
        }*/
    }

    public function amigos() {
        $this->view('Perfil/amigos', $this->loggedUser);  
    }

    public function imagens(){
        $this->view('Perfil/album', $this->loggedUser);
    }

    public function sair() {
        session_destroy();
        header('Location: index.php?mensagem=Usuário deslogado com sucesso!');  
    }
}


?>