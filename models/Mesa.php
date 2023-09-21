<?php

class Mesa {

    static $conn;

    static function save(string $titulo, string $descricao, int $idmestre) {
        self::$conn = connection();
        $query = "INSERT INTO tb_mesas ('mes_titulo', 'mes_descricao', 'mes_usu_idmestre') "
            . "values(:mes_titulo,:mes_descricao,:mes_usu_idmestre)";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":mes_titulo", $titulo);
        $sttm->bindValue(":mes_descricao", $descricao);
        $sttm->bindValue(":mes_usu_idmestre", $idmestre);
        $result = $sttm->execute();

        return $result;
    }

    static function find(string $titulo, int $idmestre) {
        self::$conn = connection();
        $query = "SELECT * FROM tb_mesas WHERE mes_titulo=:mes_titulo and mes_usu_idmestre=:mes_usu_idmestre";

        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":mes_titulo", $titulo);
        $sttm->bindValue(":mes_usu_idmestre", $idmestre);
        $result = $sttm->execute();

        return $result->fetchArray();
    }

    static function findById (int $mes_id) {
        self::$conn = connection();
        $query = "SELECT * FROM tb_mesas WHERE mes_id=:mes_id";

        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":mes_id", $mes_id);
        $result = $sttm->execute()->fetchArray();

        return $result;
    }

    static function getName ($mes_id) {
        self::$conn = connection();
        $query = "SELECT * FROM tb_mesas WHERE mes_id=:mes_id";

        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":mes_id", $mes_id);
        $result = $sttm->execute()->fetchArray();

        return $result['mes_titulo'];
    }


    static function getId(string $titulo, int $idmestre) {
        self::$conn = connection();
        $query = "SELECT * FROM tb_mesas WHERE mes_titulo=:mes_titulo and mes_usu_idmestre=:mes_usu_idmestre";

        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":mes_titulo", $titulo);
        $sttm->bindValue(":mes_usu_idmestre", $idmestre);
        $result = $sttm->execute()->fetchArray();

        return $result['mes_id'];
    }

    static function update(string $titulo, string $descricao, int $mes_id) {
        $query = "UPDATE tb_mesas SET mes_titulo=:mes_titulo, mes_descricao=:mes_descricao WHERE med_id=:mes_id";
        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":mes_titulo", $titulo);
        $sttm->bindValue(":mes_descricao", $descricao);
        $sttm->bindValue(":mes_id", $mes_id);
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    public function delete($mes_id) {
        $query = "DELETE FROM tb_mesas WHERE mes_id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":id", $mes_id);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
}