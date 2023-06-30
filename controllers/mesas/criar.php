<?php

if (!hasUser()) {
    header('location: /');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('location: /dashboard');
}

if (isset($_POST['title'], $_POST['players'], $_POST['mestre'])) {
    
    $title = $_POST['title'];
    $players = $_POST['players'];
    $mestre = $_POST['mestre'];

    $data = Mesa::findMesa($title, $players, $mestre);

    if ($data) {
        header('location: /dashboard/mesas');
    } else {
        $result = Mesa::saveMesa($title, $players, $mestre);
        header('location: /dashboard/mesas');
    }

}