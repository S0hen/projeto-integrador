<?php

    $conId = $_GET['conId'];
    $refuse = (new Convites(connection()))->refuse($conId);

    header('Location:/dashboard/user/suasmesas/recebidos?message=recusado');

?>