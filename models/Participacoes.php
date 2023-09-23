<?php
Class Participacoes {
    static $conn;

    static function save(int $mes_id, int $usu_id) {
        self::$conn = connection();
        $query = "INSERT INTO tb_participacoes ('par_mes_id', 'par_usu_id') values (:par_mes_id,:par_usu_id)";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":par_mes_id", $mes_id);
        $sttm->bindValue(":par_usu_id", $usu_id);
        $result = $sttm->execute();
        return $result;
    }

    
    public static function findByUser(int $userid) {
        $db_conn = self::$conn ?? connection();
        $query = 'SELECT * FROM tb_participacoes where par_usu_id=:userid';

        $sttm = $db_conn->prepare($query);
        $sttm->bindValue(":userid", $userid);
        $result = $sttm->execute();

        $lista_mesas = array();
        while ($mesa = $result->fetchArray()) {
            $lista_mesas[] = $mesa;
        }

        return $lista_mesas;
    }
}

?>