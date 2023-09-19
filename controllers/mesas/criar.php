<?php

$rota = Route::getRoute('/dashboard/mesas/criacao/criar');

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

    $user_obj = new User(connection());
    $mestre = $user_obj->getID($email);

    $data = Mesa::find($titulo, $mestre);

    if (!$data) {
        $result = Mesa::save($titulo, $descricao, $mestre);
        $mes_id = Mesa::getId($titulo, $mestre);
        $add = ParMesa::save($mes_id, $mestre);
        header('location: /dashboard');
    } else {
        header('location: /dashboard/mesas/criacao?message=error');
    }
}

?>