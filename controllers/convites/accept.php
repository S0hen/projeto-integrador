<?php

    $conId = $_GET['conId'];
    $convite_obj = new Convites(connection());
    $accept = $convite_obj->accept($conId);
    $convite = $convite_obj->findById($conId);
    
    $registro = Participacoes::save($convite['con_mes_id'], $convite['con_usu_id']);

    header('Location:/dashboard/user/suasmesas/recebidos?message=aceito');

?>