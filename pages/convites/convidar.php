<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/dashboard/user/suasmesas/convidar" method="POST">

        <input type="hidden" value="<?= $mesa['mes_id'] ?>">

        <label for="usermail">Email do Usuário</label>
        <br>
        <input type="text" name="usermail">

        <br>    

        <label for="message">Mensagem do Convite</label>
        <br>
        <textarea name="message"></textarea>

    </form>

    <br>

    <a href="/dashboard/user/suasmesas">Voltar</a>

</body>
</html>