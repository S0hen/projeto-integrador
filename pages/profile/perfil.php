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
        if ($password_error === true) {
            echo '<script type="text/javascript">';
            echo ' alert("Dados inalterados devido à senha incorreta")';
            echo '</script>';
        } else if ($changed === true) {
            echo '<script type="text/javascript">';
            echo ' alert("Dados alterados com sucesso")';
            echo '</script>';
        }
    ?>

    <!--
        - Imagem de Perfil

        -> Suas Informações Gerais:
        - Nome do usuário
        - Email
        
        -> Configurações:
        - Mudar nome
        - Mudar email
        - Mudar senha
        - Apagar conta

        -> Suas Mesas:

    -->

    <div class="container">
        <div class="col-12">
            <div class="row">
                <h2>Informações Gerais:</h2>
                <h4>Usuário:
                    <?= $username ?>
                </h4>
                <h4>Email:
                    <?= $email ?>
                </h4>
            </div>
            <div class="row">
                <h2>Configurações</h2>
                <div class="row mb-3">
                    <!-- Botão de mudar nome-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#mudarnomemodal">
                        Mudar nome
                    </button>

                    <!-- Modal de mudar nome-->
                    <div class="modal fade" id="mudarnomemodal" tabindex="-1" aria-labelledby="mudarnomemodalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="mudarnomemodalLabel">Digite o seu novo nome</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/dashboard">
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="novo_nome">
                                            <label for="novo_nome" class="form-label">Digite o seu novo nome:</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="confirma_senha">
                                            <label for="confirma_senha" class="form-label">Confirme com sua
                                                senha:</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Botão de mudar email-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#mudaremailmodal">
                        Mudar email
                    </button>

                    <!-- Modal de mudar email-->
                    <div class="modal fade" id="mudaremailmodal" tabindex="-1" aria-labelledby="mudaremailmodalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="mudaremailmodalLabel">Digite o seu novo email</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/">
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="novo_email">
                                            <label for="novo_email" class="form-label">Digite o seu novo email:</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="confirma_senha">
                                            <label for="confirma_senha" class="form-label">Confirme com sua
                                                senha:</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Botão de mudar senha-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#mudarsenha">
                        Mudar senha
                    </button>

                    <!-- Modal de mudar senha-->
                    <div class="modal fade" id="mudarsenha" tabindex="-1" aria-labelledby="mudarsenhaLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="mudarsenhaLabel">Digite sua nova senha</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/">
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="nova_senha">
                                            <label for="nova_senha" class="form-label">Digite a sua nova senha:</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="confirma_senha">
                                            <label for="confirma_senha" class="form-label">Confirme com sua
                                                senha atual:</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 text-center">
                    <a href="/dashboard/user/suasmesas">
                        <button type="button" class="btn btn-success">Suas Mesas</button>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</body>

</html>