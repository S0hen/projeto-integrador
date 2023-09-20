<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
</head>
<body>

    <?php

    if ($_GET['message']) {
        $message = $_GET['message'];

        if ($message == 'update') {
            echo '<script type="text/javascript">';
            echo ' alert("Dados alterados com sucesso!")';
            echo '</script>';
        }
    }

    ?>

    <div class="text-center">
        <img src="../../assets/profile.png" class="rounded" alt="...">
        <h4>Nome de usuário atual:
        <?= $username ?>
        </h4>
        <h4>Email atual:
        <?= $email ?>
        </h4>
        <h4>Senha atual:
        <?= $senha ?>
        </h4>
    </div>

    <button type="button" class="btn btn-success" data-bs-toggle="modal"
    data-bs-target="#mudarnomemodal">
    Alterar usuário
    </button>
    <hr>

    <div class="modal fade" id="mudarnomemodal" tabindex="-1" aria-labelledby="mudarnomemodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="mudarnomemodalLabel">Alterar usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>

                <form action="/dashboard/superuser/user/update/nome" method="POST">
                    <input type="hidden" value="<?= $email ?>" name="email">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="novo_nome">
                            <label for="novo_nome" class="form-label">Digite o novo nome deste usuário:</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <button type="button" class="btn btn-success" data-bs-toggle="modal"
    data-bs-target="#mudaremailmodal">
    Alterar email
    </button>
    <hr>

    <div class="modal fade" id="mudaremailmodal" tabindex="-1" aria-labelledby="mudaremailmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="mudaremailmodalLabel">Alterar email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>

                <form action="/dashboard/superuser/user/update/email" method="POST">
                    <input type="hidden" value="<?= $email ?>" name="email">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="novo_email">
                            <label for="novo_email" class="form-label">Digite o novo email do usuário:</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    <button type="button" class="btn btn-success" data-bs-toggle="modal"
    data-bs-target="#mudarsenha">
    Alterar senha
    </button>
    <hr>

    <div class="modal fade" id="mudarsenha" tabindex="-1" aria-labelledby="mudarsenhaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="mudarsenhaLabel">Alterar senha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>

                <form action="/dashboard/superuser/user/update/senha" method="POST">
                    <input type="hidden" value="<?= $email ?>" name="email">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nova_senha">
                        <label for="nova_senha" class="form-label">Digite a nova senha do usuário:</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <a href="/dashboard/superuser">Voltar</a>

</body>
</html>