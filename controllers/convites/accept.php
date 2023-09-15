<?php

    $conId = $_GET['conId'];
    $accept = (new Convite(connection()))->accept($conId);

    echo '<script type="text/javascript">';
    echo ' alert("Convite para mesa aceito!")';
    echo '</script>';
    header('Location:/');

?>