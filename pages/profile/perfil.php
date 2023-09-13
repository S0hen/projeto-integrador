<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
         .btn{
            border-radius: 20px;
        }
        .container{
            margin: 50px auto;
        }
    </style>

</head>

<body>

    <!-- Alerta após as edições -->
    <?php
        if ($_GET['changed'] === 'false') {
            echo '<script type="text/javascript">';
            echo ' alert("Dados inalterados devido à senha incorreta")';
            echo '</script>';
        } else if ($_GET['changed'] === 'false') {
            echo '<script type="text/javascript">';
            echo ' alert("Dados alterados com sucesso")';
            echo '</script>';
        }
    ?>

<!-- Perfil -->
<div class="container">

    <div class="text-center">
        <img src="../../assets/profile.png" class="rounded" alt="...">
        <h4>Usuário:
        <?= $username ?>
        </h4>
        <h4>Email:
        <?= $email ?>
        </h4> 
    </div>

</div>

<!-- Botões e Modals -->
<div class="container">
    <div class="col-md-6">
        <div class="row">
            <div class="col">

                <h3>Configurações de Conta</h3>

                <!-- Botão de usuário -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#mudarnomemodal">
                Alterar usuário
                </button>
                <hr>

                <!-- Modal de usuário -->
                <div class="modal fade" id="mudarnomemodal" tabindex="-1" aria-labelledby="mudarnomemodalLabel"
                aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="mudarnomemodalLabel">Digite o seu novo nome</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>

                            <form action="/dashboard/user/update/nome" method="POST">
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
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Botão do email -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#mudaremailmodal">
                Alterar email
                </button>
                <hr>

                <!-- Modal do email -->
                <div class="modal fade" id="mudaremailmodal" tabindex="-1" aria-labelledby="mudaremailmodalLabel"
                aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="mudaremailmodalLabel">Digite o seu novo email</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>

                            <form action="/dashboard/user/update/email" method="POST">
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
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Botão da senha -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#mudarsenha">
                Alterar senha
                </button>
                <hr>
                
                <!-- Modal da senha -->
                <div class="modal fade" id="mudarsenha" tabindex="-1" aria-labelledby="mudarsenhaLabel"
                aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="mudarsenhaLabel">Digite sua nova senha</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>

                            <form action="/dashboard/user/update/senha" method="POST">
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
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Apagar conta -->
<div class="container">
    <div class="row">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
            data-bs-target="#deletarcontamodal">
            Deletar Conta
            </button> 

            <div class="modal fade" id="deletarcontamodal" tabindex="-1" aria-labelledby="deletarcontamodalLabel"
            aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deletarcontamodalLabel">Deletar minha conta</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>

                        <form action="/dashboard/user/delete" method="POST">

                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="delete_conta">
                                    <label for="comfirma_senha" class="form-label">Insira sua senha atual</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="confirma_senha">
                                    <label for="confirma_senha_2" class="form-label">Confirme sua senha:</label>
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
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
crossorigin="anonymous"></script>
</body>

</html>