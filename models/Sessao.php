<?php

class Sessao {

    static $conn;

    static function saveSessao(string $players, string $horario, string $data) {

        self::$conn = connection();

        $query = "INSERT INTO sessao ('players', 'data_calendario', 'horario') values('{$players}','{$data}','{$horario}')";

        $result = self::$conn->exec($query);

        return $result;
    }

    static function findSessao(string $players, string $horario, string $data) {

        self::$conn = connection();

        $query = "SELECT * FROM sessao where players={$players} and data_calendario={$data} and horario={$horario}";
        
        $result = self::$conn->exec($query);

        return $result;
    }


}