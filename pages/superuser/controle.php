<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom CSS if needed -->
    <style>
        .red-strip {
            background-color: red;
            height: 5px; 
        }
        .small-card {
            padding: 10px; 
        }
        .small-card .card-body {
            font-size: 14px;
        }

        .row {
            padding-top: 30px;
        }

        .welcome-text {
            text-align: center;
            padding-top: 40px;
        }

        
    </style>
</head>
<body>
  
    <div class="container">
        <h1 class="welcome-text"> Bem vindo, admin. </h1>
        <div class="row">
            <!-- foreach pra loopar todos os usuários -->
            <?php foreach ($usuarios as $usuario) { ?>
            <div class="col-md-4">
                <div class="card mb-3 small-card">
                    <div class="red-strip"></div>
                    <div class="card-body">
                        <h5 class="card-title">Nome do usuário: <?= $usuario['usu_nome'] ?></h5>
                        <h5 class="card-title">Email do usuário: <?= $usuario['usu_email'] ?></h5>
                        <h5 class="card-title">Senha do usuário: <?= $usuario['usu_senha'] ?></h5>
                        <a href="/dashboard/superuser/user?user_email=<?= urlencode($usuario['usu_email']) ?>" class="btn btn-secondary">Editar usuário</a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <!-- foreach pra loopar todas as mesas -->
            <?php foreach ($mesas as $mesa) { ?>
            <div class="col-md-4">
                <div class="card mb-3 small-card">
                    <div class="red-strip"></div>
                    <div class="card-body">
                        <h5 class="card-title">Título da mesa: <?= $mesa['mes_titulo'] ?></h5>
                        <p class="card-text">Descrição: <?= $mesa['mes_descricao'] ?></p>
                        <a href="/dashboard/superuser/mesa/editar?mesa=<?= urlencode($mesa['mes_id']) ?>" class="btn btn-secondary">Editar mesa</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
