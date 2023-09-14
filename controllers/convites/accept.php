<?php

    $user = (new User(connection()))->getID($_SESSION['email']);
    $accept = (new Convite(connection()))->accept($user);

    echo '<script type="text/javascript">';
    echo ' alert("Convite para mesa aceito!")';
    echo '</script>';
    header('Location:/');

?>