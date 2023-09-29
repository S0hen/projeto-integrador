<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>

    <?php
    
    // pegando por get o email do usuário, e assim tirando o resto das informações
    $user_obj = new Usuarios(connection());
    $email = $_GET['user_email'];
    $username = $user_obj->getName($email);

    if ($_GET['message']) {
        $message = $_GET['message'];

        if ($message == 'update') {
            echo '<script type="text/javascript">';
            echo ' alert("Dados alterados com sucesso!")';
            echo '</script>';
        }
    }

    ?>

    <div class="text-center mb-3">
        <img src="../../assets/profile.png" class="rounded" alt="...">
        <h4>Nome de usuário atual:
        <?= $username ?>
        </h4>
        <h4>Email atual:
        <?= $email ?>
        </h4>
    </div>

    <div class="text-center">
        <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#mudarnomemodal">
            Alterar nome
            </button>
            
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#mudaremailmodal">
            Alterar email
            </button>
            
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#mudarsenha">
            Alterar senha
            </button>

        </div>
    </div>

    

    <div class="modal fade" id="mudarnomemodal" tabindex="-1" aria-labelledby="mudarnomemodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="mudarnomemodalLabel">Alterar usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>

                <form action="/dashboard/superuser/user/update/nome" method="POST">
                    <!-- envia o email pelo hidden, e no controller usa pro find e o que mais precisar -->
                    <input type="hidden" value="<?= urldecode($email) ?>" name="email">
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

    <div class="modal fade" id="mudaremailmodal" tabindex="-1" aria-labelledby="mudaremailmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="mudaremailmodalLabel">Alterar email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>

                <form action="/dashboard/superuser/user/update/email" method="POST">
                    <!-- envia o email pelo hidden, e no controller usa pro find e o que mais precisar -->
                    <input type="hidden" value="<?= urldecode($email) ?>" name="email">
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

    <div class="modal fade" id="mudarsenha" tabindex="-1" aria-labelledby="mudarsenhaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="mudarsenhaLabel">Alterar senha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>

                <form action="/dashboard/superuser/user/update/senha" method="POST">
                    <!-- envia o email pelo hidden, e no controller usa pro find e o que mais precisar -->
                    <input type="hidden" value="<?= urldecode($email) ?>" name="email">
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

    <!-- fiz o modal pra deletar também porque percebi que não tinha -->
    <div class="modal fade" id="apagarmesa" tabindex="-1" aria-labelledby="apagarmesaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="apagarmesaLabel">Tem certeza de que deseja
                        apagar este usuário?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- envia o email do usuário por get e usa no controller e pá -->
                    <a href="/dashboard/superuser/user/delete?useremail=<?= urlencode($email) ?>">
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

    <a href="/dashboard/superuser">Voltar</a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>