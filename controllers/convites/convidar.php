<?php

if (!hasUser()) {
    header('location: /');
} else {
 
    if (!$_GET['mesa']) {
        header('Location: /dashboard');
    }

    if ($_GET['message']) {
        $message = $_GET['message'];

        if ($message == 'aceito') {
            echo '<script type="text/javascript">';
            echo ' alert("Convite enviado com sucesso.")';
            echo '</script>';
        }
    }

    $mesa = Mesas::findById($_GET['mesa']);
    
    include ('pages/convites/convidar.php');

}