<?php

class Route 
{
    protected static $routes;
    protected $caminho; // URI
    protected $controller;
    protected $method;
    protected $profile; //nivel de acesso da rota

    public function __construct (string $caminho, string $controller, string $method, string $profile) {
        $this->caminho = $caminho;
        $this->controller = $controller;
        $this->method = $method;
        $this->profile = $profile;
    }

    public function getCaminho () : string {
        return $this->caminho;
    }

    public function getController () : string {
        return $this->controller;
    }

    public function getMethod () : string {
        return $this->method;
    }

    public function getProfile () : string {
        return $this->profile;
    }

    public static function get (string $caminho, string $controller, string $profile) : Route {
        //função para registrar uma rota do tipo GET
        if (self::$routes == NULL) { //checa se a lista tá nula
            self::$routes = [];
        }
        
        //cria e adiciona a rota na lista de rotas
        $rota = new Route($caminho, $controller, 'GET', $profile);
        array_push(self::$routes, $rota);
        return $rota;
    }

    public static function post (string $caminho, string $controller, string $profile) : Route {
        if (self::$routes == NULL) { //checa se a lista tá nula
            self::$routes = [];
        }
        
        //cria e adiciona a rota na lista de rotas
        $rota = new Route($caminho, $controller, 'POST', $profile);
        array_push(self::$routes, $rota);
        return $rota;
    }

    public static function rotear (string $caminho, string $method) {
        //implementar
        
        foreach (self::$routes as $rota) {            
            if ($rota->getCaminho() == $caminho) {
            
                if ($rota->getMethod() == $method) {
                    
                    include __DIR__ . $rota->getController();
                    exit;

                } else {
                    echo "Método inadequado";
                    exit;
                } 
            }
        }

        echo "Página não encontrada";
        exit; 
    }

    public static function getRoute(string $caminho) {
        foreach(self::$routes as $rota) {
            if ($caminho == $rota->getCaminho()) {
                return $rota;
            }
        } return false;
    }
}