<?php

include_once("Banco.php");

class Albuns {

    /**
    * @var string Email do usuário. 
    */
    private $email_user;

    /**
    * @var string nome do album. 
    */
    private $nomeAlbum;

    /**
    * @var string nome do album. 
    */
    private $visibilidade;    


    function __construct(string $email_user, string $nomeAlbum, string $visibilidade) {
        $this->email_user = $email_user;
        $this->nomeAlbum = $nomeAlbum;
        $this->visibilidade = $visibilidade; 
    }

    public function __get($campo) {
        return $this->$campo;
    }

    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    public function salvar() {
        $db = Banco::getInstance();
        $stmt = $db->prepare('INSERT INTO Albuns (email_user, nomeAlbum, visibilidade) VALUES (:email_user, :nomeAlbum, :visibilidade)');
        $stmt->bindValue(':email_user', $this->email_user);
        $stmt->bindValue(':nomeAlbum', $this->nomeAlbum);
        $stmt->bindValue(':visibilidade', $this->visibilidade);
        $stmt->execute();
    }

    public static function listar(string $email) {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM Albuns WHERE email_user = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
    
        $resultado = $stmt->fetchAll();
        $i = 0;
        $albuns[0] = 'TEM NADA';

        while ($resultado[$i]) {
            $aux = $resultado[$i];
            //echo "<p> <img src='" . $aux['caminho'] . "' align='middle' class='album'> </p>";
            $albuns[$i] = new Albuns($aux['email_user'], $aux['nomeAlbum'], $aux['visibilidade']);
            //$albuns[$i] = $aux['nomeAlbum'];
            $i++;
        } 
        return $albuns;
    }

    public static function quantidade(string $email, string $nomeAlbum) {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT COUNT(*) FROM Imagens WHERE email_user = :email AND nomeAlbum = :nomeAlbum');
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':nomeAlbum', $nomeAlbum);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $quantidade['fotos'] = $resultado[0];

        $stmt = $db->prepare('
        SELECT caminho FROM Imagens 
        WHERE email_user = :email AND
        nomeAlbum = :nomeAlbum
        ORDER BY nomeAlbum
        DESC LIMIT 1');
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':nomeAlbum', $nomeAlbum); 
        $stmt->execute();
        $resultado = $stmt->fetch();
        $quantidade['caminho'] = $resultado;

        return $quantidade;

    } 

}

?>