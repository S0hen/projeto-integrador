<?php

    if (!hasUser() || ($_SERVER['REQUEST_METHOD'] === 'POST')) {
        header('Location: /'); 
    } else {
        $sessao = $_GET['sessao'];
        Sessoes::delete($sessao);
        
        header('Location: /dashboard/user/sessoes?message=deleted');
    }
?>