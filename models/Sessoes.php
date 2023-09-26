<?php

class Sessoes {

    static $conn;

    static function save(string $horario, string $data, int $mes_id) {
        self::$conn = connection();
        $query = "INSERT INTO tb_sessoes ('ses_horario', 'ses_datacalendario', 'ses_mes_id') "
        . "values(:ses_horario,:ses_datacalendario,:ses_mes_id)";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":ses_horario", $horario);
        $sttm->bindValue(":ses_datacalendario", $data);
        $sttm->bindValue(":ses_mes_id", $mes_id);
        $result = $sttm->execute();
        return $result;
    }

    public static function findByMesId(int $mes_id) {
        $db_conn = self::$conn ?? connection();
        $query = 'SELECT * FROM tb_sessoes where ses_mes_id=:mes_id';

        $sttm = $db_conn->prepare($query);
        $sttm->bindValue(":mes_id", $mes_id);
        $result = $sttm->execute();

        $lista_sessoes = array();
        while ($sessao = $result->fetchArray()) {
            $lista_sessoes[] = $sessao;
        }

        return $lista_sessoes;
    }

    static function find(string $horario, string $data, int $mes_id) {
        self::$conn = connection();
        $query = "SELECT * FROM tb_sessoes WHERE ses_horario=:horario and ses_datacalendario=:ses_datacalendario and ses_mes_id=:ses_mes_id";
        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":horario", $horario);
        $sttm->bindValue(":ses_datacalendario", $data);
        $sttm->bindValue(":ses_mes_id", $mes_id);
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    static function update(string $horario, string $data, int $mes_id) {
        self::$conn = connection();
        $query = "UPDATE tb_sessoes SET ses_horario=:horario, ses_datacalendario=:ses_datacalendario WHERE ses_mes_id=:ses_mes_id";
        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":horario", $horario);
        $sttm->bindValue(":ses_datacalendario", $data);
        $sttm->bindValue(":ses_mes_id", $mes_id);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
    
    static function delete(int $ses_id) {
        self::$conn = connection();
        $query = "DELETE FROM tb_sessoes WHERE ses_id=:ses_id";
        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":ses_id", $ses_id);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
}