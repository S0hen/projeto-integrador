<?php

Route::get('/', '/pages/home.html', '');
Route::get('/register', '/pages/auth/register.php', '');
Route::get('/login', '/pages/auth/login.html', '');
Route::get('/dashboard', '/pages/dashboard.php', '');
Route::get('/perfil', '/pages/profile/perfil.php', '');

Route::post('/signup', '/controllers/auth/signup.php', '');
Route::post('/signin', '/controllers/auth/signin.php', '');
Route::get('/signout', '/controllers/auth/signout.php', '');

Route::get('/dashboard/mesas', '/pages/mesas/exibirmesas.php', '');
Route::get('/dashboard/mesas/criacao', '/pages/mesas/criacao.php', '');

Route::get('/dashboard/user', '/controllers/profile/index.php', '');
Route::post('/dashboard/user/update/nome', '/controllers/profile/updatename.php', '');
Route::post('/dashboard/user/update/email', '/controllers/profile/updateemail.php', '');
Route::post('/dashboard/user/update/senha', '/controllers/profile/updatepassword.php', '');
Route::post('/dashboard/user/delete', '/controllers/profile/deleteuser.php', '');

Route::get('/dashboard/user/suasmesas', '/controllers/mesas/showmesas.php', '');
Route::get('/dashboard/user/suasmesas/editar', '/controllers/mesas/editar.php', '');
Route::post('/dashboard/mesas/criar', '/controllers/mesas/criar.php', '');

Route::get('/dashboard/user/sessoes/agendamento', '/pages/sessoes/agendamento.php', '');
Route::post('/dashboard/user/sessoes/agendar', '/controllers/sessoes/agendar.php', '');
Route::get('/dashboard/user/sessoes', '/controllers/sessoes/historico.php', '');

Route::get('/dashboard/user/suasmesas/recebidos', '/controllers/convites/showconvites.php', '');
Route::get('/dashboard/user/suasmesas/convite', '/controllers/convites/convidar.php', '');

?>