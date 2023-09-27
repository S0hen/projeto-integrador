<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>

        body {
            background-image: url('../../assets/daniel-rosini-ritual-final.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .custom-header {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-bottom: 30px;
            font-family: 'Poppins', sans-serif;
        }

        .icon { 
        font-family: 'Poppins', sans-serif;
        position: absolute;
        top: 10px;
        right: 7px;
        border-radius: 10px;
      
    }

        .card {
            background-color: transparent !important;
            border: none;
        }

        .card-body {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
        }

        .card-title,
        .card-text {
            color: white; 
        }

        .card .btn {
            color: white;
        }
    </style>
</head>

<body>
<div class="custom-header">
        <h1>Suas Mesas</h1>
        <div class="icon">
            <a href="/dashboard/user" class="btn btn-secondary  bg-transparent icon"> Perfil </a>
        </div>
        
    </div>

    <div class="container">
        <?php
        foreach ($mesas as $mesa) {
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Título da mesa: <?= $mesa['mes_titulo'] ?></h5>
                    <p class="card-text">Descrição: <?= $mesa['mes_descricao'] ?></p>
                    <?php
                    if ($userid = $mesa['mes_usu_idmestre']) {
                        ?>
                        <a href="/dashboard/user/suasmesas/editar?mesa=<?= urlencode($mesa['mes_id']) ?>" class="btn btn-success">Editar mesa</a>
                        <a href="/dashboard/user/sessoes/agendamento?mesa=<?= urlencode($mesa['mes_id']) ?>" class="btn btn-primary">Agendar Sessão</a>
                        <a href="/dashboard/user/suasmesas/convite?mesa=<?= urlencode($mesa['mes_id']) ?>" class="btn btn-info">Convidar usuários</a>
                    <?php } ?>
                    <a href="/dashboard/user/sessoes?mesa=<?= urlencode($mesa['mes_id']) ?>" class="btn btn-secondary">Histórico de Sessões</a>
                </div>
            </div>
            <?php
        } ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
