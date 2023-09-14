<?php

    $user = (new User(connection()))->getID($_SESSION['email']);
    $refuse = (new Convite(connection()))->refuse($user);

    echo '<script type="text/javascript">';
    echo ' alert("Convite para mesa recusado.")';
    echo '</script>';
    header('Location:/');

?>