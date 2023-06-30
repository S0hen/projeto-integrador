<?php

class Mesa {

    static $conn;

    static function saveMesa(string $title, string $players, string $mestre) {

        self::$conn = connection();

        $query = "INSERT INTO mesas ('title', 'players', 'mestre') values('{$title}','{$players}','{$mestre}')";

        $result = self::$conn->exec($query);

        return $result;
    }

    static function findMesa(string $title, string $players, string $mestre) {

        self::$conn = connection();

        $query = "SELECT * FROM mesas where title={$title} and players={$players} and mestre={$mestre}";
        
        $result = self::$conn->exec($query);

        return $result;
    }


}