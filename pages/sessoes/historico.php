<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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
        } ?>

        <div class="row">
            <a href="/dashboard/user">
                <button>Voltar para as suas mesas</button>
            </a>
        </div>

    </div>

</body>

</html>