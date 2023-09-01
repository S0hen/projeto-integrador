<?php

class Sessao {

    static $conn;

    static function save(string $players, string $horario, string $data) {
        self::$conn = connection();
        $query = "INSERT INTO sessao ('players', 'data_calendario', 'horario') "
        . "values(:players,:data_calendario,:horario)";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":players", $players);
        $sttm->bindValue(":data_calendario", $data);
        $sttm->bindValue(":horario", $horario);
        $result = $sttm->execute();
        return $result;
    }

    static function find(string $players, string $horario, string $data) {

        self::$conn = connection();

        $query = "SELECT * FROM sessao where players={$players} and data_calendario={$data} and horario={$horario}";
        
        $result = self::$conn->exec($query);

        $query = "SELECT * FROM mesas WHERE players=:players and horario=:horario and data_calendario=:data_calendario";
        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":players", $players);
        $sttm->bindValue(":horario", $horario);
        $sttm->bindValue(":data_calendario", $data);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
}