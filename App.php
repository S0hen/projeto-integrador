<?php
class App 
{
    public static function run () {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        //recebe a requisição do usuário
        //mostrar a página
        Route::rotear ($uri, $method);
    }
}
?>