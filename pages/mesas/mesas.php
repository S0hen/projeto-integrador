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

        foreach($mesas as $mesa) {

            ?>

            <div class="row">
                <h2>Título da mesa: <?= $mesa['mes_titulo'] ?></h2>
                <p>Descrição: <?= $mesa['mes_descricao'] ?></p>
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