<?php

Route::get('/', '/pages/home.html', '');
Route::get('/register', '/pages/auth/register.html', '');
Route::get('/login', '/pages/auth/login.html', '');
Route::get('/dashboard', '/pages/dashboard.php', '');

Route::post('/signup', '/controllers/auth/signup.php', '');
Route::post('/signin', '/controllers/auth/signin.php', '');
Route::get('/signout', '/controllers/auth/signout.php', '');

Route::get('/dashboard/mesas', '/pages/mesas/exibirmesas.php', '');
Route::get('/dashboard/mesas/criacao', '/pages/mesas/criacao.html', '');

Route::get('/dashboard/user', '/controllers/profile/index.php', '');
Route::get('/dashboard/user/suasmesas', '/controllers/mesas/showmesas.php', '');
Route::get('/dashboard/user/suasmesas/editar', '/controllers/mesas/editar.php', '');
Route::post('/dashboard/mesas/criar', '/controllers/mesas/criar.php', '');

Route::get('/dashboard/user/sessoes/agendamento', '/pages/sessoes/agendamento.php', '');
Route::post('/dashboard/user/sessoes/agendar', '/controllers/sessoes/agendar.php', '');
Route::get('/dashboard/user/sessoes', '/controllers/sessoes/historico.php', '');


?>