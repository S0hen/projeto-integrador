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
}

?>