<?php

if (!hasUser()) {
    header('location: /');
} else {
 
    if (!$_GET['mesa']) {
        header('Location: /dashboard');
    }

    $mesa = Mesa::findById($_GET['mesa']);
    
    include ('pages/convites/convidar.php');

}