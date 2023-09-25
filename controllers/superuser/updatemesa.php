<?php

    $mes_id = $_POST['mesa'];

if (!hasUser() || !isset($mes_id)) {
    header('location: /');
} else {
    $mesa = Mesas::findById($mes_id);

    Mesas::update($_POST['titulo'], $_POST['descricao'], $mes_id);
    include('pages/superuser/editamesasr.php');
}