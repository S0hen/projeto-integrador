<?php

class User
{
    protected $conn; //conexão

    public function __construct(mysqli $connection) {
        $this->conn = $connection;
    }

    public function save(string $name, string $email, string $password) {
        
        //gera o hash
        $senha_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users ('name', 'email', 'password') values('{$name}','{$email}','{$senha_hash}')";

        $result = $this->conn->query($query);

        return $result;
    }

    public function find (string $email) {
        $query = "SELECT * FROM users where email={$email}";
        
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

}