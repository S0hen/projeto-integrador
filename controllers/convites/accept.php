<?php

    $conId = $_GET['conId'];
    $accept = (new Convite(connection()))->accept($conId);
    
    header('Location:/dashboard/user/suasmesas/recebidos:message=aceito');

?>