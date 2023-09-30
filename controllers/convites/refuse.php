<?php

    $usuId = (new Usuarios(connection()))->getID($_SESSION['email']);
    $convite_obj = new Convites(connection());
    $conId = $_GET['conId'];
    $convite = $convite_obj->findById($conId);

    if((!hasUser()) || ($_SERVER['REQUEST_METHOD']) == 'POST') {
        header('Location:/');
    } else if ($usuId != $convite['con_usu_id']) {
        echo '<h1>Este convite não está direcionado à você.</h1>';
        echo '<a href="/dashboard/user/suasmesas">Voltar</a>';
    } else {
        $refuse = (new Convites(connection()))->refuse($conId);

        header('Location:/dashboard/user/suasmesas/recebidos?message=recusado');
    }


?>