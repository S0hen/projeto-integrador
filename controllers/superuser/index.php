<?php

    $rota = Route::getRoute('/dashboard/superuser');

    if (!hasUser() || (!authorize($rota)) || ($_SERVER['REQUEST_METHOD'] === 'POST')) {
        header('Location: /');
    
    } else {
        $usuarios = (new Usuarios(connection()))->getAll();
        $mesas = Mesas::getAll();

        include('pages/superuser/index.php');
    }


        // aqui tipo, o que eu pensei, teria uma lista com todos os usuários e mesas, já que é isso que o superuser
        // mexe principalmente, na mesma vibe de botão dos convites, só que ai seria alterar e deletar, por exemplo
        // nisso, ele seria redirecionado pra página de alterar, se fosse o caso de alterar, ou só usava os deletes
        // de cada um dos modelos que já tem, mas não sei o quão viável/inviável é fazer isso
        // no caso um include pra uma page, com esses lances que falei
?>