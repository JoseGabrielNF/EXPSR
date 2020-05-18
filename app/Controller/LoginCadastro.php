<?php 

require 'Controlador.php';
require 'app/Model/Usuario.php'; 

class LoginCadastroController extends Controller  {
    
    /**
    * @var Usuario armazena o usuário logado no momento.
    */
    private $loggedUser;
    
    //Inicia/recupera a sessão do usuário e recupera o usuário logado.

    function __construct() {
        session_start();
        if (isset($_SESSION['user'])) $this->loggedUser = $_SESSION['user'];
    }
    
    //POST - busca pelo email no banco e confere se a senha é igual. Se sim, usuário logado!
    //GET  - se não logado, abre a página de login, senão mostra as informações do usuário
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $_POST['email'];
            $usuario = Usuario::buscar($_POST['email']);

            if (!is_null($usuario) && $usuario->igual($_POST['email'], $_POST['senha'])) {
                $_SESSION['user'] = $this->loggedUser = $usuario;
            }
            

            if ($this->loggedUser) {
                header('Location: perfil.php?acao=meuperfil');
            } else {
                header('Location: index.php?email=' . $_POST['email'] . '&mensagem=Usuário e/ou senha incorreta!');
            }
        } else {
            $this->view('LoginCadastro/login');

        }
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new Usuario($_POST['email'], $_POST['senha'], $_POST['nome']);
            
            try {
                $user->salvar();
                header('Location: index.php?acao=login&email=' . $_POST['email'] . '&mensagem=Usuário cadastrado com sucesso!');
            } catch(PDOException $erro) {
                header('Location: index.php?acao=cadastrar&mensagem=Email já cadastrado!');
            }
        }
        $this->view('LoginCadastro/cadastro');  
    }

    public function paginaInicial() {
        require 'app/View/LoginCadastro/paginaInicial.php';
    }
}

?>