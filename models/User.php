<?php

class User
{
    protected $conn; //conexão

    public function __construct(SQLite3 $connection) {
        $this->conn = $connection;
    }

    public function save(string $name, string $email, string $password) : SQLite3Result | bool {
        $query = "INSERT INTO tb_usuarios ('usu_name', 'usu_email', 'usu_password') "
            . "values(:usu_name,:usu_email,:usu_password)";

        $sttm = $this->conn->prepare($query);

        $sttm->bindValue(":usu_name", $name);
        $sttm->bindValue(":usu_email", $email);
        $sttm->bindValue(":usu_password", password_hash($password, PASSWORD_ARGON2I));
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
    
    public function getID (string $email) {
        $model = $this->find($email);
        return $model["usu_id"];
    }
    
    public function getName (string $email) {
        $model = $this->find($email);
        return $model["usu_name"];
    }
    
    public function getPassword (string $email) {
        $model = $this->find($email);
        return $model["usu_password"];
    }

    public function updateName(string $new_name, string $email) {
        $query = "UPDATE tb_usuarios SET usu_nome=:new_name WHERE usu_email=:email";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":new_name", $new_name);
        $sttm->bindValue(":email", $this->find($email));
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    public function updatePassword(string $new_password, string $email) {
        $query = "UPDATE tb_usuarios SET usu_password=:new_password WHERE usu_email=:email";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":new_password", password_hash($new_password, PASSWORD_ARGON2I));
        $sttm->bindValue(":email", $this->find($email));
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    public function updateEmail(string $new_email, string $email) {
        $query = "UPDATE tb_usuarios SET usu_email=:new_name WHERE usu_name=:email";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":new_email", $new_email);
        $sttm->bindValue(":email", $this->find($email));
        $result = $sttm->execute();
        return $result->fetchArray();
    }
}
?>