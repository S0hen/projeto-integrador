<?php

if (!hasUser() || ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    header('Location: /');

} else {

    $mes_id = $_GET['mesa'];
    Mesas::delete($mes_id);
    
    header('Location: /dashboard/user/suasmesas');
    
}

?>