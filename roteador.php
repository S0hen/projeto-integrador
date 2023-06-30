<?php

$rotas = [
    '/' => '/pages/home.html',
    '/register' => '/pages/auth/register.html',
    '/login' => '/pages/auth/login.html',
    '/dashboard' => '/pages/dashboard.php',

    '/signup' => '/controllers/auth/signup.php',
    '/signin' => '/controllers/auth/signin.php',
    '/signout' => '/controllers/auth/signout.php',

    '/dashboard/mesas' => '/pages/mesas/exibirmesas.php',
    '/dashboard/mesas/agendamento' => '/pages/mesas/agendamento.html',
    '/dashboard/mesas/criacao' => '/pages/mesas/criacao.html',

    '/dashboard/mesas/criacao/criar' => '/controllers/mesas/criar.php',
    '/dashboard/mesas/agendamento/agendar' => '/controllers/mesas/agendar.php'

];

function rotear($uri, $rotas) {
    if (array_key_exists($uri, $rotas)) {
        include __DIR__ . $rotas[$uri];
    } else {
        echo 'Página Inexistente';
    }
}

?>