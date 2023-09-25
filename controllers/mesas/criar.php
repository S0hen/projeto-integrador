<?php

if (!hasUser()) {
    header('location: /');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('location: /dashboard');
}

if (isset($_POST['titulo'], $_POST['descricao'], $_SESSION['email'])) {
    
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $email = $_SESSION['email'];

    $user_obj = new Usuarios(connection());
    $mestre = $user_obj->getID($email);

    $data = Mesas::find($titulo, $mestre);

    if (!$data) {
        $result = Mesas::save($titulo, $descricao, $mestre);
        $mes_id = Mesas::getId($titulo, $mestre);
        $add = Participacoes::save($mes_id, $mestre);
        header('location: /dashboard');
    } else {
        header('location: /dashboard/mesas/criacao?message=error');
    }
}

?>