<?php

class Convites {

    protected $conn; //conexão

    public function __construct(SQLite3 $connection) {
        $this->conn = $connection;
    }

    // usa igual aos de User
    public function find (string $nome) : Array | bool {
        $userid = (new Usuarios(connection()))->getIDByName($nome);

        $query = "SELECT * FROM tb_convites WHERE con_usu_id=:usu_id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":usu_id", $userid);
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    // convida alguém pra mesa (usado pelo mestre)
    public function invite(string $mensagem, int $usu_id, int $mes_id) {
        $data = date('Y-m-d');

        $query = "INSERT INTO tb_convites ('con_datacalendario', 'con_status', 'con_show', 'con_mensagem', 'con_usu_id',"
        . " 'con_mes_id') values(:con_datacalendario, :con_status, :con_show, :con_mensagem, :con_usu_id, :con_mes_id)";

        $sttm = $this->conn->prepare($query);

        $sttm->bindValue(":con_datacalendario", $data);
        $sttm->bindValue(":con_status", false);
        $sttm->bindValue(":con_show", true);
        $sttm->bindValue(":con_mensagem", $mensagem);
        $sttm->bindValue(":con_usu_id", $usu_id);
        $sttm->bindValue(":con_mes_id", $mes_id);
        $result = $sttm->execute();
        return $result;
    }
    
    // usa igual aos de User
    public function getID (string $nome) {
        $userid = (new Usuarios(connection()))->getIDByName($nome);

        $model = $this->find($userid);
        return $model["con_id"];
    }

    // usa no controller fazer um foreach e mostrar todos
    public function findByPlayer(int $userid) {
        $query = 'SELECT * FROM tb_convites where con_usu_id=:userid AND con_show=:true';

        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":userid", $userid);
        $sttm->bindValue(":true", true);
        $result = $sttm->execute();

        $lista_convites = array();
        while ($convite = $result->fetchArray()) {
            $lista_convites[] = $convite;
        }

        return $lista_convites;
    }
    
    // usa no controller fazer um foreach e mostrar todos
    public function findById (int $con_id) {
        $query = "SELECT * FROM tb_convites WHERE con_id=:con_id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":con_id", $con_id);
        $result = $sttm->execute()->fetchArray();

        return $result;
    }

    // aceita o convite e para de mostrar (usado pelo convidado)
    public function accept(int $con_id) {
        $query = "UPDATE tb_convites SET con_status=:con_status, con_show=:con_show WHERE con_id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":con_status", true);
        $sttm->bindValue(":con_show", false);
        $sttm->bindValue(":id", $con_id);
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    // status continua false e para de mostrar (usado pelo convidado)
    public function refuse(int $con_id) {
        $query = "UPDATE tb_convites SET con_show=:con_show WHERE con_id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":con_show", false);
        $sttm->bindValue(":id", $con_id);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
}

?>