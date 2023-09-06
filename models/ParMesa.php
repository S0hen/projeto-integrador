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

    static function find(int $usu_id) {
        self::$conn = connection();
        $query = "SELECT * FROM tb_participamesa WHERE pam_usu_id=:pam_usu_id";

        $sttm = self::$conn->prepare($query);

        $sttm->bindValue(":pam_usu_id", $usu_id);
        $result = $sttm->execute();
        return $result->fetchArray();
    }

    /* ERRO AQUI */
    public static function findAll(int $usu_id) {
        $lista_mesas = array();

        while ($mesa = self::find($usu_id)) {
            array_push($lista_mesas, [
                'pam_mes_id' => $mesa['pam_mes_id'],
            ]);
        }

        

        $info_mesas = array();
        foreach ($lista_mesas as  $id) {
            array_push($info_mesas, Mesa::findById($id));
        }

        return $info_mesas;
    }
}

?>