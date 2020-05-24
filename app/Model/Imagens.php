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

    /** 
    * @var string caminho onde a foto está armazenada. 
    */
    private $nomeAlbum;

    /** 
    * @var string caminho onde a foto está armazenada. 
    */
    private $descricao;    

    function __construct(string $email_user, string $caminho, string $nomeAlbum, string $descricao) {
        $this->email_user = $email_user;
        $this->caminho = $caminho;
        $this->nomeAlbum = $nomeAlbum;
        $this->descricao = $descricao;
    }

    public function __get($campo) {
        return $this->$campo;
    }

    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    public function salvar() {
        $db = Banco::getInstance();
        $stmt = $db->prepare('INSERT INTO Imagens (email_user, caminho, nomeAlbum, descricao) VALUES (:email_user, :caminho, :nomeAlbum, :descricao)');
        $stmt->bindValue(':email_user', $this->email_user);
        $stmt->bindValue(':caminho', $this->caminho);
        $stmt->bindValue(':nomeAlbum', $this->nomeAlbum);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->execute();
    }

    public static function listar(string $email, string $nomeAlbum) {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM Imagens WHERE email_user = :email and nomeAlbum = :nomeAlbum');
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':nomeAlbum', $nomeAlbum);
        $stmt->execute();
    
        $resultado = $stmt->fetchAll();
        $i = 0;
        $imagens[0] = 'TEM NADA';

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