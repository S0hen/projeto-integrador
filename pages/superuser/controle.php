<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- página principal do superuser, o index.php vai dar include nessa aqui -->

    <!-- foreach pra loopar todos os usuários, e nisso tem o botão que envia o email de cada Usuário por get -->
    <div class="container">
        <?php
        foreach ($usuarios as $usuario) {
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Nome do usuário: <?= $usuario['usu_nome'] ?></h5>
                    <h5 class="card-title">Email do usuário: <?= $usuario['usu_email'] ?></h5>
                    <h5 class="card-title">Senha do usuário: <?= $usuario['usu_senha'] ?></h5>
                    <a href="/dashboard/superuser/user?user_email=<?= urlencode($usuario['usu_email']) ?>" class="btn btn-secondary">Editar mesa</a>
                </div>
            </div>
            <?php
        } ?>

    <!-- foreach pra loopar todas as mesas, e nisso tem o botão que envia o id de cada Mesa por get -->
    <div class="container">
        <?php
        foreach ($mesas as $mesa) {
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Título da mesa: <?= $mesa['mes_titulo'] ?></h5>
                    <p class="card-text">Descrição: <?= $mesa['mes_descricao'] ?></p>
                    <a href="/dashboard/superuser/mesa/editar?mesa=<?= urlencode($mesa['mes_id']) ?>" class="btn btn-secondary">Editar mesa</a>
                </div>
            </div>
            <?php
        } ?>

    </div>

</body>
</html>