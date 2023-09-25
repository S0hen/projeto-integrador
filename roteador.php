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
Route::post('/dashboard/user/update/nome', '/controllers/profile/updatenome.php', '');
Route::post('/dashboard/user/update/email', '/controllers/profile/updateemail.php', '');
Route::post('/dashboard/user/update/senha', '/controllers/profile/updatesenha.php', '');
Route::post('/dashboard/user/delete', '/controllers/profile/apagar.php', '');

Route::get('/dashboard/user/suasmesas', '/controllers/mesas/showmesas.php', '');
Route::get('/dashboard/user/suasmesas/update', '/controllers/mesas/editar.php', '');
Route::get('/dashboard/user/suasmesas/delete', '/controllers/mesas/apagar.php', '');
Route::post('/dashboard/mesas/criar', '/controllers/mesas/criar.php', '');

Route::get('/dashboard/user/sessoes/agendamento', '/pages/sessoes/agendamento.php', '');
Route::post('/dashboard/user/sessoes/agendar', '/controllers/sessoes/agendar.php', '');
Route::get('/dashboard/user/sessoes', '/controllers/sessoes/historico.php', '');

Route::get('/dashboard/user/suasmesas/recebidos', '/controllers/convites/showconvites.php', '');
Route::get('/dashboard/user/suasmesas/convite', '/controllers/convites/convidar.php', '');
Route::post('/dashboard/user/suasmesas/convidar', '/controllers/convites/inviteuser.php', '');
Route::get('/dashboard/user/suasmesas/aceitar', '/controllers/convites/accept.php', '');
Route::get('/dashboard/user/suasmesas/recusar', '/controllers/convites/refuse.php', '');

Route::post('/dashboard/superuser', '/controllers/superuser/index.php', 'adm');
Route::get('/dashboard/superuser/user', '/pages/superuser/editarusu.php', 'adm');
Route::get('/dashboard/superuser/user/update/nome', '/controllers/superuser/updatenome.php', 'adm');
Route::get('/dashboard/superuser/user/update/nome', '/controllers/superuser/updateemail.php', 'adm');
Route::get('/dashboard/superuser/user/update/nome', '/controllers/superuser/updatesenha.php', 'adm');
Route::get('/dashboard/superuser/user/delete', '/controllers/superuser/apagauser.php', 'adm');

Route::get('/dashboard/superuser/mesa/editar', '/controllers/superuser/updatemesa.php', 'adm');
Route::get('/dashboard/superuser/mesa/delete', '/controllers/superuser/apagamesa.php', 'adm');

?>