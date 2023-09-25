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

        foreach ($convites as $convite) {

            $mesa_titulo = Mesas::getName($convite['con_mes_id']);

            ?>

            <div class="row">
                <h2>Título da mesa:
                    <?= $mesa_titulo ?>
                </h2>
                <p>Data do convite:
                    <?= $convite['con_datacalendario'] ?>
                </p>
                <p>Mensagem:
                    <?= $convite['con_mensagem'] ?>
                </p>

                <?php

                if ($convite['con_show'] == true) {
                    ?>
                    
                    <a href="/dashboard/user/suasmesas/aceitar?conId=<?= urlencode($convite['con_id']) ?>">Aceitar</a>
                    <a href="/dashboard/user/suasmesas/recusar?conId=<?= urlencode($convite['con_id']) ?>">Recusar</a>

                <?php
                }        
        } ?>

        <div class="row">
            <a href="/dashboard/user">
                <button>Voltar para o seu perfil</button>
            </a>
        </div>

    </div>

</body>

</html>