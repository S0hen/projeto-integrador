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
        background-image: url('daniel-rosini-murlocs-rpg-final4.jpg');
        background-position: center;
      }

    .container-fluid{
        opacity: 0.9;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row text-center mt-5 mb-3">
            <!-- <i class="fa fa-user fa-5x addcolor" aria-hidden="true"></i> -->
        </div>
        <div class="row d-flex justify-content-center align-items-center p-4 ">
            <div class="col-12 col-md-8 bg-white rounded-5 p-4 border border-success-subtle">
                
                <div class="row text-center">
                    <h3 class="p-3 addcolor">Agende uma sessão com seus amigos</h3>
                    <a href="/dashboard/mesas" class="text-decoration-none">
                        <p class="mb-4 text-muted">Voltar</p>
                    </a>    
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <form action="/dashboard/user/sessoes/agendar" method="POST">
                            <input name="mes_id" type="hidden" value="<?= $_GET['mesa'] ?>"> 
                            <div class="mb-4 form-floating">
                                <input type="date" class="form-control" id="data" name="data">
                                <label for="data" class="form-label">Data</label>
                              </div>
                            <div class="mb-4 form-floating">
                                <input type="time" class="form-control" id="horario" name="horario">
                                <label for="horario" class="form-label">Horário</label>
                            </div>
                            <div class="mb-4 form-floating">
                                <input type="text" class="form-control" id="jogadores" name="players">
                                <label for="players" class="form-label">Jogadores</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success addingcolor text-white w-75">Agendar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>