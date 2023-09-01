<?php

class User
{
    protected $conn; //conexão

    public function __construct(SQLite3 $connection) {
        $this->conn = $connection;
    }

    public function save(string $name, string $email, string $password, string $type) : SQLite3Result | bool {
        $query = "INSERT INTO users ('name', 'email', 'password', 'type') "
            . "values(:name,:email,:password,:type)";

        $sttm = $this->conn->prepare($query);

        $sttm->bindValue(":name", $name);
        $sttm->bindValue(":email", $email);
        $sttm->bindValue(":password", password_hash($password, PASSWORD_ARGON2I));
        $sttm->bindValue(":type", $type);
        $result = $sttm->execute();
        return $result;
    }

    public function find (string $email) : Array | bool {
        $query = "SELECT * FROM users WHERE email=:email";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":email", $email);
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    public function getType ($email) {
        $model = $this->find($email);
        return $model["type"];
    }  
}
?>