<?php

require __DIR__ . "/../vendor/autoload.php";

use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;
use \App\DatabaseManager\Database;
use \App\Http\Middleware\Queue as MiddlewareQueue;

//Carrega variáveis de ambiente
Environment::load(__DIR__."/../");

//Define as configurações do banco de dados
Database::config(
    getenv("db_host"),
    getenv("db_name"),
    getenv("db_user"),
    getenv("db_pass"),
    getenv("db_port")
);

//Define a constante de URL
define("URL", getenv("URL"));

//Define o valor padrão das variáveis
View::init([
    "URL" => URL
]);

//DEFINE O MAPEAMENTO DE MIDDLEWARES
MiddlewareQueue::setMap([
    "maintenance" => \App\Http\Middleware\Maintenance::class
]);

//DEFINE O MAPEAMENTO DE MIDDLEWARES PADRÕES (EXECUTADOS EM TODAS AS ROTAS)
MiddlewareQueue::setDefault([
    "maintenance"
]);

?>