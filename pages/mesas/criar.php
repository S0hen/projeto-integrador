<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Mesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        
    *{
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-image: url('Camp under the waterfall  battlemap.jpeg');
        background-position: center;
    }

    .container-fluid {
        opacity: 0.9;
        margin: 50px auto;
        height: 5px;
    }

    .btn{
        border-radius: 20px;
        }
        
</style>

<body>

    <?php
    $message = $_GET['message'];
        if ($message  === 'error') {
            echo '<script type="text/javascript">';
            echo ' alert("Você já possui uma mesa com esse nome, por favor, mude-o.")';
            echo '</script>';
        }
    ?>

    <div class="container-fluid">
        <div class="row text-center mt-5 mb-3">
            <!-- <i class="fa fa-user fa-5x addcolor" aria-hidden="true"></i> -->
        </div>
        <div class="row d-flex justify-content-center align-items-center p-4 ">
            <div class="col-12 col-md-8 bg-white rounded-5 p-4 border border-success-subtle">

                <div class="row text-center">
                    <h3 class="p-3 addcolor">Você está criando uma nova mesa!</h3>
                    <a href="/" class="text-decoration-none">
                        <p class="mb-4 text-muted">Voltar</p>
                    </a>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <form action="/dashboard/mesas/criar" method="POST">
                            <div class="mb-4 form-floating">
                                <input type="text" class="form-control" id="titulo" name="titulo">
                                    <label for="titulo" class="form-label">Nome da Mesa</label>
                            </div>
                            <div class="mb-4 form-floating">
                                <textarea type="text" class="form-control" id="descricao" name="descricao"></textarea>
                                <label for="descricao" class="form-label">Descrição</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success addingcolor text-white w-75">Criar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>