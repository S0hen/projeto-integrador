<?php
Class ParMesa {
    static $conn;

    static function save(int $mes_id, int $usu_id) {
        self::$conn = connection();
        $query = "INSERT INTO tb_participamesa ('pam_mes_id', 'pam_usu_id') values (:pam_mes_id,:pam_usu_id)";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":pam_mes_id", $mes_id);
        $sttm->bindValue(":pam_usu_id", $usu_id);
        $result = $sttm->execute();
        return $result;
    }

    
    public static function findByUser(int $userid) {
        $db_conn = self::$conn ?? connection();
        $query = 'SELECT * FROM tb_participamesa where pam_usu_id=:userid';

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