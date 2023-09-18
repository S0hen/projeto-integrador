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

        foreach ($convite as $convite) {

            $mesa_titulo = Mesa::getName($convite['con_mes_id']);

            ?>

            <div class="row">
                <h2>Título da mesa:
                    <?= $mesa_titulo ?>
                </h2>
                <p>Data do convite:
                    <?= $convite['con_datacalendario'] ?>
                </p>
                <p>Mensagem:
                    <?= $convite['con_datacalendario'] ?>
                </p>

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