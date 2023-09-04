<?php

class Sessao {

    static $conn;

    static function save(string $horario, string $data) {
        self::$conn = connection();
        $query = "INSERT INTO tb_sessoes ('ses_horario', 'ses_datacalendario') "
        . "values(:ses_horario,:ses_datacalendario)";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":ses_horario", $horario);
        $sttm->bindValue(":ses_datacalendario", $data);
        $result = $sttm->execute();
        return $result;
    }

    static function find(string $horario, string $data) {

        self::$conn = connection();
        $query = "SELECT * FROM tb_sessoes WHERE ses_horario=:horario and ses_datacalendario=:ses_datacalendario";
        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":horario", $horario);
        $sttm->bindValue(":ses_datacalendario", $data);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
}