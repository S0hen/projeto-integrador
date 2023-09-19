<?php

    $conId = $_GET['conId'];
    $refuse = (new Convite(connection()))->refuse($conId);

    header('Location:/');

?>