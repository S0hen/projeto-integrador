<?php

    $conId = $_GET['conId'];
    $refuse = (new Convite(connection()))->refuse($conId);

    echo '<script type="text/javascript">';
    echo ' alert("Convite para mesa recusado.")';
    echo '</script>';
    header('Location:/');

?>