<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    
    <div class="container">

    <h3>Usuários</h3>

    <?php

    

    foreach ($usuarios as $usuario) {
    ?>

    <p>ID do usuário: <?= $usuario['usu_id'] ?></p>
    <p>Nome do usuário: <?= $usuario['usu_nome'] ?></p>
    <p>Email do usuário: <?= $usuario['usu_email'] ?></p>
    <p>Senha do usuário: <?= $usuario['usu_nome'] ?></p>

    <button>
        <a href="/dashboard/superuser/user?user_email=<?= urlencode($usuario['usu_email']) ?>">Editar usuário</a>
    </button>
    
    <?php
    }
    ?>

    <hr>

    <h3>Mesas</h3>

    <?php


    foreach ($mesas as $mesa) {
    ?>

    <p>ID da mesa: <?= $mesa['mes_id'] ?></p>
    <p>Título da mesa: <?= $mesa['mes_titulo'] ?></p>
    <p>Descrição da mesa: <?= $mesa['mes_descricao'] ?></p>
    <p>ID do mestre: <?= $mesa['mes_usu_idmestre'] ?></p>

    <button>
        <a href="/dashboard/superuser/mesa?mesa=<?= urlencode($mesa['mes_id']) ?>">Editar mesa</a>
    </button>

    <?php
    }
    ?>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>