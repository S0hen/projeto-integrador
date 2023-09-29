<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


</head>

<body>

<?php

    // pega o id da mesa pelo get, e usa pro que precisar
    $mesa = Mesas::findById($_GET['mesa']);

    if ($_GET['message'] === 'sucesso') {
        echo '<script type="text/javascript">';
        echo ' alert("Dados alterados com sucesso")';
        echo '</script>';
    }
?>

    <div class="container">
        <div class="col-12">
            <div class="row text-center mb-3">
                <h1>
                    Edite a mesa
                </h1>
            </div>
            <form action="/dashboard/superuser/mesa/editar">
                <!-- o id da mesa é enviado por post por meio do hidden input, e é usado pra fazer o update em
                /controllers/superuser/updatemesa.php -->
                <div class="row justify-content-center mb-3">
                        <input type="hidden" class="form-control" name="mesa" value="<?= urlencode($mesa['mes_id']) ?>">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="titulo" value="<?= urlencode($mesa['mes_titulo']) ?>">
                        <label for="titulo" class="form-label">Título da Mesa:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea type="text" class="form-control"
                            name="descricao"><?= urldecode($mesa['mes_descricao']) ?></textarea>
                        <label for="descricao" class="form-label">Descrição da Mesa:</label>
                    </div>
                    <button type="submit" class="btn btn-success w-25">Salvar</button>
                </div>
            </form>
            <div class="row justify-content-center mb-3">
                <!-- Botão de apagar mesa-->
                <button type="button" class="btn btn-danger w-25" data-bs-toggle="modal" data-bs-target="#apagarmesa">
                    Apagar mesa
                </button>
                <!-- Modal de apagar mesa-->
                <div class="modal fade" id="apagarmesa" tabindex="-1" aria-labelledby="apagarmesaLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="apagarmesaLabel">Tem certeza de que deseja
                                    apagar a mesa?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a href="/dashboard/superuser/mesa/delete?mesa=<?= urlencode($mesa['mes_id']) ?>">
                                    <button class="btn btn-danger">Sim, tenho certeza.</button>
                                </a>
                                <a href="/">
                                    <button class="btn btn-secondary">Cancelar</button>
                                </a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="/dashboard/superuser" class="btn btn-primary w-25">Voltar</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</body>

</html>