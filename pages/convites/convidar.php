<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
    
    *{
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }
    body{
        background-image: url('/assets/nano-giga-interactive-the-dark-forest.jpg');
        background-position: center;
        }
    .btn{
        border-radius: 20px;
        color: white;
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
        color: black;
        opacity: 0.9;
    }
    .card{
        margin: 50px auto;
        color:rgba(0, 0, 0, 0.5);
    }
    .footer{
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 10px 0;
        text-align: center;
        margin-bottom: 30px;
    }
</style>
</head>
<body>
    <div class="custom-header">
        <h1>Envie Convites</h1>
        <div class="icon">
            <a href="/dashboard/user" class="btn btn-secondary  bg-transparent icon"> Perfil </a>
        </div>
    </div>
   <div class="container"> 
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="card-body">
                <form action="/dashboard/user/suasmesas/convidar" method="POST">

                    <input type="hidden" value="<?= $mesa['mes_id'] ?>" name="mesa">
            
                    <label for="nome">Nome do Usuário</label>
                    <br>
                    <input type="text" name="nome" class="form-control">
                    <br>    
                    <label for="message">Mensagem do Convite</label>
                    <br>
                    <textarea name="message" class="form-control" rows="3"></textarea>
                    <br>
                    <button type="submit" class="btn btn-info">Enviar</button>
                </form>
            </div>
          </div>
      </div>
   </div>
    <br>   
    <div class="footer">
        <a href="/dashboard/user/suasmesas">Voltar</a> 
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
</html>