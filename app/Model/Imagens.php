<?php

include_once("Banco.php");

class Imagens {

    /**
    * @var string Email do usuário. 
    */
    private $email_user;

    /**
    * @var string caminho onde a foto está armazenada. 
    */
    private $caminho;


    function __construct(string $email_user, string $caminho) {
        $this->email_user = $email_user;
        $this->caminho = $caminho;
    }

    public function __get($campo) {
        return $this->$campo;
    }

    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    public function salvar() {
        $db = Banco::getInstance();
        $stmt = $db->prepare('INSERT INTO Imagens (email_user, caminho) VALUES (:email_user, :caminho)');
        $stmt->bindValue(':email_user', $this->email_user);
        $stmt->bindValue(':caminho', $this->caminho);
        $stmt->execute();
    }

    public static function listar(string $email) {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM Imagens WHERE email_user = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
    
        $resultado = $stmt->fetchAll();
        $i = 0;

        while ($resultado[$i]) {
            $aux = $resultado[$i];
            //echo "<p> <img src='" . $aux['caminho'] . "' align='middle' class='album'> </p>";
            $imagens[$i] = $aux['caminho'];
            $i++;
        } 
        return $imagens;
    }

}

?>