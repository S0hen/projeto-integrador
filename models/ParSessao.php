<?php
Class ParSessao {
    static $conn;

    static function save(int $ses_id, int $usu_id) {
        self::$conn = connection();
        $query = "INSERT INTO tb_participasessao ('pas_ses_id', 'pas_usu_id') values (:pas_ses_id,:pas_usu_id)";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":pas_ses_id", $ses_id);
        $sttm->bindValue(":pas_usu_id", $usu_id);
        $result = $sttm->execute();
        return $result;
    }
}

?>