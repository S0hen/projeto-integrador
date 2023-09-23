<?php

    $conId = $_GET['conId'];
    $accept = (new Convites(connection()))->accept($conId);
    
    header('Location:/dashboard/user/suasmesas/recebidos?message=aceito');

?>