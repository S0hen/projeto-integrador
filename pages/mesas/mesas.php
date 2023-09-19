<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">

        <?php

        foreach ($mesas as $mesa) {

            ?>

            <div class="row">
                <h2>Título da mesa:
                    <?= $mesa['mes_titulo'] ?>
                </h2>
                <p>Descrição:
                    <?= $mesa['mes_descricao'] ?>
                </p>

                <?php

                if ($userid = $mesa['mes_usu_idmestre']) {
                    ?>

                    <a href="/dashboard/user/suasmesas/editar?mesa=<?= urlencode($mesa['mes_id']) ?>">
                        <button class="btn btn-success">Editar mesa</button>
                    </a>

                    <a href="/dashboard/user/sessoes/agendamento?mesa=<?= urlencode($mesa['mes_id']) ?>">
                        <button>Agendar Sessão</button>
                    </a>

                    <a href="/dashboard/user/suasmesas/convite?mesa=<?= urlencode($mesa['mes_id']) ?>">
                        <button>Convidar usuários</button>
                    </a>

                <?php } ?>
                <a href="/dashboard/user/sessoes?mesa=<?= urlencode($mesa['mes_id']) ?>">
                    <button>Histórico de Sessões</button>
                </a>

            </div>

            <?php
        } ?>

        <div class="row">
            <a href="/dashboard/user">
                <button>Voltar para o seu perfil</button>
            </a>
        </div>

    </div>

</body>

</html>