<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
        if (isset($_GET['message'])) {
            if ($_GET['message'] === 'updated') {
                echo '<script type="text/javascript">';
                echo ' alert("Dados da sessão alterados com sucesso!")';
                echo '</script>';
            } else if ($_GET['message'] === 'deleted') {
                echo '<script type="text/javascript">';
                echo ' alert("Sessão excluída com êxito.")';
                echo '</script>';
            }
        }
    ?>

    <div class="container">
        <h2>Título da mesa:
            <?= $mesa['mes_titulo'] ?>
        </h2>

        <?php

        foreach ($sessoes as $sessao) {

            ?>

            <div class="row">
                <p>Dia da Sessão:
                    <?= $sessao['ses_datacalendario'] ?>
                </p>
                <p>Horário:
                    <?= $sessao['ses_horario'] ?>
                </p>
            </div>

            <?php
            if ($userid == $mesa['mes_usu_idmestre']) {
            ?>
                <button>
                    <a href="/dashboard/user/sessoes/reagendamento?mes_id=<?= $mesa['mes_id'] ?>">
                        Editar sessão
                    </a>
                </button>
                <button>
                    <a href="/dashboard/user/apagar?sessao=<?= $sessao['ses_id'] ?>">
                        Excluir sessão
                    </a>
                </button>
            <?php
            } 
        } ?>

        <div class="row">
            <a href="/dashboard/user">
                <button>Voltar para as suas mesas</button>
            </a>
        </div>

    </div>

</body>

</html>