<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Sessão</title>
    
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Your custom CSS styles -->
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
                <?php } ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="/dashboard/user">
                            <button class="btn btn-primary">Voltar para as suas mesas</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
