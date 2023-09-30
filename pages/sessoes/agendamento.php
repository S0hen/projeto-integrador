<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Sessão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<style>
    body {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .card {
            max-width: 300px;
            margin: 0 auto;
        }
        .btn {
            margin-left: 57px;
            border-radius: 25px;
            color:white;
            width: 150px;
        }
</style>

<body>
<div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h2>Agende sua sessão</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-6">
                <div class="card" style="border-color: #198754;">
                    <div class="card-body">
                        <form action="/dashboard/user/sessoes/agendar" method="POST">
                            <input name="mes_id" type="hidden" value="<?= $_GET['mesa']?>">
                            <div class="mb-4 form-floating">
                                <input type="date" class="form-control" id="data" name="data">
                                <label for="data" class="form-label">Data</label>
                            </div>
                            <div class="mb-4 form-floating">
                                <input type="time" class="form-control" id="horario" name="horario">
                                <label for="horario" class="form-label">Horário</label>
                            </div>
                            
                            <button type="submit" class="btn btn-success text-white">Agendar</button>
                        </form>
                    </div>
                </div>
                <a href="/dashboard/mesas" class="text-decoration-none text-center">
                    <p class="mb-4 text-muted" style="margin-top: 20px;">Voltar</p>
                </a>    
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>