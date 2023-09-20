<?php

class User
{
    protected $conn; //conexão

    public function __construct(SQLite3 $connection) {
        $this->conn = $connection;
    }

    public function save(string $nome, string $email, string $senha, string $tipo) : SQLite3Result | bool {
        $query = "INSERT INTO tb_usuarios ('usu_nome', 'usu_email', 'usu_senha', 'usu_tipo') "
            . "values(:usu_nome,:usu_email,:usu_senha,:usu_tipo)";

        $sttm = $this->conn->prepare($query);

        $sttm->bindValue(":usu_nome", $nome);
        $sttm->bindValue(":usu_email", $email);
        $sttm->bindValue(":usu_senha", password_hash($senha, PASSWORD_ARGON2I));
        $sttm->bindValue(":usu_tipo", $tipo);
        $result = $sttm->execute();
        return $result;
    }

    public function find (string $email) : Array | bool {
        $query = "SELECT * FROM tb_usuarios WHERE usu_email=:usu_email";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":usu_email", $email);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
    
    public function findByName (string $nome) : Array | bool {
        $query = "SELECT * FROM tb_usuarios WHERE usu_nome=:usu_nome";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":usu_nome", $nome);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
    
    public function getID (string $email) {
        $model = $this->find($email);
        return $model["usu_id"];
    }
    
    public function getIDByName (string $nome) {
        $model = $this->findByName($nome);
        return $model["usu_id"];
    }
    
    public function getName (string $email) {
        $model = $this->find($email);
        return $model["usu_nome"];
    }
    
    public function getPassword (string $email) {
        $model = $this->find($email);
        return $model["usu_senha"];
    }
    
    public function getTipo (string $email) {
        $model = $this->find($email);
        return $model["usu_tipo"];
    }

    public function updateName(string $newname, string $email) {
        $query = "UPDATE tb_usuarios SET usu_nome=:new_name WHERE usu_id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":new_name", $newname);
        $sttm->bindValue(":id", $this->getID($email));
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    public function updatePassword(string $newpassword, string $email) {
        $query = "UPDATE tb_usuarios SET usu_senha=:newpassword WHERE usu_id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":newpassword", password_hash($newpassword, PASSWORD_ARGON2I));
        $sttm->bindValue(":id", $this->getID($email));
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    public function updateEmail(string $newemail, string $email) {
        $query = "UPDATE tb_usuarios SET usu_email=:new_email WHERE usu_id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":new_email", $newemail);
        $sttm->bindValue(":id", $this->getID($email));
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    public function delete($email) {
        $query = "DELETE FROM tb_usuarios WHERE usu_id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":id", $this->getID($email));
        $result = $sttm->execute();
        return $result->fetchArray();
    }
}
?>