<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Sessão</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">


    <style>

        body {
            background-image: url('../../assets/daniel-rosini-ritual-final.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Poppins', sans-serif;
        }
        
        .custom-card {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px; 
            margin: 0 auto; 
        }
        .custom-card p {
            font-size: 18px;
        }

        .custom-card h2 {
            font-size: 24px;
        }

        .btn-custom  {
            background-color: blue; 
            color: white; 
            border: none; 
            padding: 8px 16px; 
            margin-right: 10px; 
            width: 150px;
            height: 40px;
        }
        .div-going-back {
            padding-top: 20px;

        }

       .btn-custom a {
            color: white; 
            text-decoration: none; 
        }

        .card-title {
            margin-bottom: 20px;
        }

        
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card custom-card">
            <div class="card-body">
                <h2 class="card-title text-center">Título da mesa: <?= $mesa['mes_titulo'] ?></h2>
                <?php foreach ($sessoes as $sessao) { ?>
                    <div class="row">
                        <p class="col-md-6">Dia da Sessão: <?= $sessao['ses_datacalendario'] ?></p>
                        <p class="col-md-6">Horário: <?= $sessao['ses_horario'] ?></p>
                    </div>
                    <?php
                    if ($userid == $mesa['mes_usu_idmestre']) {
                    ?>
                    
                    <div class="row justify-content-center">
                        <button class="btn btn-custom">
                            <a href="/dashboard/user/sessoes/reagendamento?mes_id=<?= $mesa['mes_id'] ?>">Editar sessão</a>
                        </button>
                        <button type="button" class="btn w-30 btn-custom bg-danger" data-bs-toggle="modal" data-bs-target="#apagarsessao">
                            Apagar sessão
                        </button>
                    </div>

                    <!-- Modal de excluir sessão-->
                    <div class="modal fade" id="apagarsessao" tabindex="-1" aria-labelledby="apagarsessaoLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="apagarsessaoLabel">Tem certeza de que deseja
                                        apagar a sessão?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <a href="/dashboard/user/apagar?sessao=<?= $sessao['ses_id'] ?>">
                                        <button class="btn btn-danger">Sim, tenho certeza.</button>
                                    </a>
                                    <a>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    } 
                } ?>
                <div class="row">
                    <div class="col-md-12 text-center div-going-back">
                        <a href="/dashboard/user">
                            <button class="btn btn-primary ">Voltar para as suas mesas</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>
</html>