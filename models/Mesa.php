<?php

class Mesa {

    static $conn;

    static function save(string $title, string $players, string $mestre) {
        self::$conn = connection();
        $query = "INSERT INTO mesas ('title', 'players', 'mestre') "
            . "values(:title,:players,:mestre)";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":title", $title);
        $sttm->bindValue(":players", $players);
        $sttm->bindValue(":mestre",$mestre);
        $result = $sttm->execute();
        return $result;
    }

    static function find(string $title, string $players, string $mestre) {
        self::$conn = connection();
        $query = "SELECT * FROM mesas WHERE title=:title and players=:players and mestre=:mestre";
        $sttm = self::$conn->prepare($query);
        $sttm->bindValue(":title", $title);
        $sttm->bindValue(":players", $players);
        $sttm->bindValue(":mestre", $mestre);
        $result = $sttm->execute();
        return $result->fetchArray();
    }
}