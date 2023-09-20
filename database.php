<?php

function connection() : SQLite3 {
    return new SQLite3('database.db');
}

function find ($query, $connection) {
    $connection = connection();
    return $connection->query($query);
}

function save($query) {
    $db = connection();
    return $db->exec($query);
}

$connection = connection();


$connection->exec(
    "CREATE TABLE IF NOT EXISTS tb_usuarios(
        usu_id INTEGER PRIMARY KEY,
        usu_nome TEXT,
        usu_email TEXT,
        usu_senha TEXT,
        usu_tipo TEXT)" 
);

$connection->exec("CREATE TABLE IF NOT EXISTS tb_mesas(
    mes_id INTEGER PRIMARY KEY,
    mes_titulo TEXT,
    mes_descricao TEXT,
    mes_usu_idmestre INTEGER,
    FOREIGN KEY (mes_usu_idmestre) REFERENCES tb_usuarios(usu_id))"
);

$connection->exec("CREATE TABLE IF NOT EXISTS tb_sessoes(
    ses_id INTEGER PRIMARY KEY,
    ses_horario TIME,
    ses_datacalendario DATE,
    ses_mes_id INTEGER,
    FOREIGN KEY (ses_mes_id) REFERENCES tb_mesas(mes_id))"
);

$connection->exec("CREATE TABLE IF NOT EXISTS tb_temas(
    tem_id INTEGER PRIMARY KEY,
    tem_tema TEXT)"
);

$connection->exec("CREATE TABLE IF NOT EXISTS tb_participamesa(
    pam_id INTEGER PRIMARY KEY,
    pam_mes_id INTEGER,
    pam_usu_id INTEGER,
    FOREIGN KEY (pam_mes_id) REFERENCES tb_mesas(mes_id),
    FOREIGN KEY (pam_usu_id) REFERENCES tb_usuarios(usu_id))"
);

/*$connection->exec("CREATE TABLE IF NOT EXISTS tb_participasessao(
    pas_id INTEGER PRIMARY KEY,
    pas_ses_id INTEGER,
    pas_usu_id INTEGER,
    FOREIGN KEY (pas_ses_id) REFERENCES tb_sessoes(ses_id),
    FOREIGN KEY (pas_usu_id) REFERENCES tb_usuarios(usu_id))"
);*/

$connection->exec("CREATE TABLE IF NOT EXISTS tb_listatemas(
    lit_id INTEGER PRIMARY KEY,
    lit_mes_id INTEGER,
    FOREIGN KEY (lit_mes_id) REFERENCES tb_mesas(mes_id))"
);

$connection->exec(
    "CREATE TABLE IF NOT EXISTS tb_convites(
        con_id INTEGER PRIMARY KEY,
        con_datacalendario date,
        con_status boolean,
        con_show boolean,
        con_mensagem TEXT,
        con_usu_id TEXT,
        con_mes_id TEXT,
        FOREIGN KEY (con_usu_id) REFERENCES tb_usuarios(usu_id),
        FOREIGN KEY (con_mes_id) REFERENCES tb_mesas(mes_id))" 
);

$superuser = new User(connection());
if (!$superuser->find('super@user')) {
    $superuser->save('superuser', 'super@user', 'adm123321', 'adm');
}

?>