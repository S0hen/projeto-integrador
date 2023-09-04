<?php

class Mesa {

    static $conn;

    static function save(string $titulo, int $idmestre, string $descricao) {
        self::$conn = connection();
        $query = "INSERT INTO tb_mesas ('mes_titulo', 'mes_usu_idmestre', 'mes_descricao') "
            . "values(:mes_titulo,:mes_usu_idmestre,:mes_descricao)";

        $sttm = self::$conn->prepare($query);

        

        $sttm->bindValue(":mes_titulo", $titulo);
        $sttm->bindValue(":mes_usu_idmestre", $idmestre);
        $sttm->bindValue(":mes_descricao", $descricao);
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
}