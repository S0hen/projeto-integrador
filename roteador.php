<?php

Route::get('/', '/pages/home.html', '');
Route::get('/register', '/pages/auth/register.html', '');
Route::get('/login', '/pages/auth/login.html', '');
Route::get('/dashboard', '/pages/dashboard.php', '');

Route::post('/signup', '/controllers/auth/signup.php', '');
Route::post('/signin', '/controllers/auth/signin.php', '');
Route::get('/signout', '/controllers/auth/signout.php', '');

Route::get('/dashboard/mesas', '/pages/mesas/exibirmesas.php', '');
Route::get('/dashboard/mesas/agendamento', '/pages/mesas/agendamento.html', '');
Route::get('/dashboard/mesas/criacao', '/pages/mesas/criacao.html', '');

Route::post('/dashboard/mesas/criacao/criar', '/controllers/mesas/criar.php', '');
Route::post('/dashboard/mesas/agendamento/agendar', '/controllers/mesas/agendar.php', '');

?>