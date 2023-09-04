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

    public function getType ($email) {
        $model = $this->find($email);
        return $model["tipo"];
    }
    
    public function getID ($email) {
        $model = $this->find($email);
        return $model["usu_id"];
    }
    
    public function getName ($email) {
        $model = $this->find($email);
        return $model["usu_name"];
    }
}
?>