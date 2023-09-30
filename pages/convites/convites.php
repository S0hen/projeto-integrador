<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convites Recebidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css");
    *{
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }
    body {
        background-image: url('/assets/nano-giga-interactive-lab-infiltration-1.jpg');
        background-position: center;
        }
    .btn{
        border-radius: 20px;
    }
    .custom-header {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 10px 0;
        text-align: center;
        margin-bottom: 30px;
        font-family: 'Poppins', sans-serif;    
        }
    .container{
        margin: 50px auto;
        opacity: 0.9;
    }
    .card-header{
        background-color: #556B2F;
        color:whitesmoke;
    }
    .footer{
        background-color:  	#808000;
    }
</style>
</head>
<body>
    <div class="custom-header">
        <h1>Convites Recebidos</h1>
        <div class="icon">
            <a href="/dashboard/user" class="btn btn-secondary  bg-transparent icon"> Perfil </a>
        </div>
   </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-envelope-exclamation-fill"> Novo convite!</i>
            </div>
            <div class="card-body">
                <?php
                foreach ($convites as $convite) {
                    $mesa_titulo = Mesas::getName($convite['con_mes_id']);
                    ?>
        
                        <h2>Título da mesa:
                            <?= $mesa_titulo ?>
                        </h2>
                        <p>Data do convite:
                            <?= $convite['con_datacalendario'] ?>
                        </p>
                        <p>Mensagem:
                            <?= $convite['con_mensagem'] ?>
                        </p>
                     <hr>
                        <?php
        
                        if ($convite['con_show'] == true) {
                            ?>
                            
                            <a href="/dashboard/user/suasmesas/aceitar?conId=<?= urlencode($convite['con_id']) ?>">Aceitar</a>
                            <a href="/dashboard/user/suasmesas/recusar?conId=<?= urlencode($convite['con_id']) ?>">Recusar</a>
        
                        <?php
                        }        
                } ?>
            </div>
          </div>
    </div>
    <div class="footer">
        <h1></h1>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
</html>