<?php

include_once("Banco.php");

class Usuario {

    /**
    * @var string Email do usuário. 
    */
    private $email;

    /**
    * @var string Senha do usuário. 
    */
    private $senha;

    /**
    * @var string Nome completo do usuário
    */
    private $nome;

    function __construct(string $email, string $senha, string $nome) { 
        $this->email = $email;
        $this->senha = hash('sha256', $senha);
        $this->nome = $nome;
    }

    public function __get($campo) {
        return $this->$campo;
    }

    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    /**
    *   Método que verifica se o email e senha providos são iguais ao da instância.
    *   Sua importância é devido ao fato da senha ser codificada.
    *
    *   @return bool Retorna TRUE se igual, senão FALSE
    */
    public function igual(string $email, string $senha) {
        return $this->email === $email && $this->senha === hash('sha256', $senha);
    }

    public function salvar() {
        $db = Banco::getInstance();
        $stmt = $db->prepare('INSERT INTO Usuarios (email, senha, nome) VALUES (:email, :senha, :nome)');
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute();
    }

    /**
     * 
     * @return Usuario retorna ums instância de usuário
     */
    public static function buscar(string $email) {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM Usuarios WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $resultado = $stmt->fetch();

        if ($resultado) {
            $usuario = new Usuario($resultado['email'], $resultado['senha'], $resultado['nome']);
            $usuario->senha = $resultado['senha'];
            return $usuario;
        } else {
            return NULL;
        }
    }

    public static function quantidade(string $email) {
        $db = Banco::getInstance();
        $stmt = $db->prepare('SELECT count(*) FROM Albuns WHERE email_user = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $quantidade['albuns'] = $resultado[0];

        $stmt = $db->prepare('SELECT count(*) FROM Imagens WHERE email_user = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $quantidade['imagens'] = $resultado[0]; 
        return $quantidade;
    }

}

?>